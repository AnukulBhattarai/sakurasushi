<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Student $student)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'method' => 'nullable|string|max:255',
            'note' => 'nullable|string|max:255',
            'paid_at' => 'required|date',
        ]);

        $payment_remaining = $student->payment_remaining - $request->amount;
        if ($payment_remaining < 0) {
            return redirect()->back()->withErrors(['amount' => 'Payment exceeds the remaining balance.']);
        }
        $student->update(['payment_remaining' => $payment_remaining]);

        $payment = Payment::create([
            'student_id' => $student->id,
            'amount' => $request->amount,
            'method' => $request->method,
            'note' => $request->note,
            'paid_at' => $request->paid_at,
        ]);

        return redirect()->route('student.show', $student)->with('success', 'Payment recorded successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
