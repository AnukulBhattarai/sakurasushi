<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('program')->latest()->simplePaginate(15);
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
        ]);
        // dd($request->all());

        $program = Program::find($request->program_id);


        $payment_remaining = $program->price;

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'payment_remaining' => $payment_remaining,
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
