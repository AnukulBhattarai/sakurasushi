<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\Program;
use App\Models\Student;
use DateTime;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Leads::with('program')->latest();

        if ($request->has('status') && in_array($request->status, ['pending', 'joined'])) {
            $query->where('status', $request->status);
        }

        $leads = $query->simplePaginate(15);

        return view('pages.leads.index', compact('leads'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Program::all();
        return view('pages.leads.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|integer',
            'program_id' => 'required|exists:programs,id',
        ]);
        $lead = Leads::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'program_id' => $request->program_id,
            'date_of_visit' => now()->toDateString(),
        ]);

        return redirect()->route('lead.index')->with('success', 'Lead created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leads $lead)
    {
        $lead->load('program');
        return view('pages.leads.show', compact('lead'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leads $lead)
    {
        $courses = Program::all();
        return view('pages.leads.edit', compact('lead', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leads $lead)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|integer',
            'program_id' => 'required|exists:programs,id',
        ]);

        $lead->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('lead.index')->with('success', 'Lead updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leads $lead)
    {
        $lead->delete();
        return redirect()->route('lead.index')->with('success', 'Lead deleted successfully.');
    }

    public function change_status(Request $request, Leads $lead)
    {
        if ($request->status == 'joined') {
            $course = Program::find($lead->program_id);
            $student = Student::create([
                'name' => $lead->name,
                'email' => $lead->email,
                'phone' => $lead->phone,
                'payment_remaining' => $course->price,
            ]);
            $student->program()->attach($course->id, [
                'enrolled_at' => now(),
            ]);
            $lead->update([
                'status' => $request->status,
            ]);
        } else {
            $lead->update([
                'status' => $request->status,
            ]);
        }
        return redirect()->route('lead.index')->with('success', 'Lead status updated successfully.');
    }
}
