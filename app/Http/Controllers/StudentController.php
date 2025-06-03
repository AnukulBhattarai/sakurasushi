<?php

namespace App\Http\Controllers;

use Anuzpandey\LaravelNepaliDate\LaravelNepaliDate;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Dipesh\NepaliDate\NepaliDate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        $paymentStatus = $request->input('payment_status');

        $students = Student::with('program')
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', "%{$query}%")
                        ->orWhere('phone', 'like', "%{$query}%");
                });
            })
            ->when($paymentStatus === 'paid', function ($q) {
                $q->where('payment_remaining', 0);
            })
            ->when($paymentStatus === 'due', function ($q) {
                $q->where('payment_remaining', '>', 0);
            })
            ->latest()
            ->simplePaginate(15);

        $students->getCollection()->transform(function ($student) {
            $student->program_id = $student->program->pluck('id')->first();
            return $student;
        });

        return view('pages.students.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('pages.students.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'program_id' => 'required|exists:programs,id',
            'discount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $program = Program::findOrFail($request->program_id);
            $payment_remaining = $program->price - $request->discount;

            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'payment_remaining' => $payment_remaining,
            ]);

            $engDate = date('Y-m-d');
            $paid_at = LaravelNepaliDate::from($engDate)->toNepaliDate();

            Payment::create([
                'student_id' => $student->id,
                'amount' => $request->discount,
                'method' => 'Discount',
                'note' => 'Discount',
                'paid_at' => $paid_at,
            ]);

            $program->students()->attach($student->id);

            DB::commit();

            return redirect()->route('student.index')->with('success', 'Student created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Student creation failed: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again.']);;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('program', 'payments');
        return view('pages.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $programs = Program::all();
        return view('pages.students.edit', compact('student', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('student.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->load('program', 'payments');
        if (count($student->payments) > 0) {
            return redirect()->back()->withErrors(['error' => 'Cannot delete student with payments.']);
        }
        if (count($student->program) > 0) {
            foreach ($student->program as $program) {
                $program->students()->detach($student->id);
            }
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully.');
    }

    public function search()
    {
        return view('pages.students.search');
    }
}
