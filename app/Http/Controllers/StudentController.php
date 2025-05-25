<?php

namespace App\Http\Controllers;

use Anuzpandey\LaravelNepaliDate\LaravelNepaliDate;
use App\Models\Payment;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Dipesh\NepaliDate\NepaliDate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        $students = Student::with('program')
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('name', 'like', "%{$query}%")
                        ->orWhere('phone', 'like', "%{$query}%");
                });
            })
            ->latest()
            ->simplePaginate(15);

        $students->getCollection()->transform(function ($student) {
            // Get the first program ID or null if none exists
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
            'payment_remaining' => 'required|numeric|min:0',
        ]);
        // dd($request->all());

        $program = Program::find($request->program_id);


        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'payment_remaining' => $request->payment_remaining,
        ]);


        // Create a new instance of NepaliDate with today's date
        // $nepaliDate = new NepaliDate($today);

        $amount = $program->price - $request->payment_remaining;

        $engDate = date('Y-m-d');

        $paid_at =  LaravelNepaliDate::from($engDate)->toNepaliDate();

        $payment = Payment::create([
            'student_id' => $student->id,
            'amount' => $amount,
            'method' => 'Discount',
            'note' => 'Discount',
            'paid_at' => $paid_at, // Use current timestamp
        ]);

        $program->students()->attach($student->id);

        return redirect()->route('student.index')->with('success', 'Student created successfully.');
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
