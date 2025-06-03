<?php

namespace App\Http\Controllers;

use Anuzpandey\LaravelNepaliDate\LaravelNepaliDate;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->input('start_date')) {
            $startDate =  LaravelNepaliDate::from($request->input('start_date'))->toNepaliDate();
        } else {
            $startDate = null;
        }
        if ($request->input('end_date')) {
            $endDate =  LaravelNepaliDate::from($request->input('end_date'))->toNepaliDate();
        } else {
            $endDate = null;
        }

        $payments = Payment::with('student')
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('paid_at', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay()
                ]);
            }, function ($query) {
                $engDate = date('Y-m-d');
                $paid_at =  LaravelNepaliDate::from($engDate)->toNepaliDate();
                $query->whereDate('paid_at', $paid_at);
            })
            ->orderBy('paid_at', 'desc')
            ->paginate(10);

        return view('pages.payments.index', compact('payments', 'startDate', 'endDate'));
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

        DB::beginTransaction();

        try {
            $student->update(['payment_remaining' => $payment_remaining]);

            $paid_at = LaravelNepaliDate::from($request->paid_at)->toNepaliDate();

            Payment::create([
                'student_id' => $student->id,
                'amount' => $request->amount,
                'method' => $request->method,
                'note' => $request->note,
                'paid_at' => $paid_at,
            ]);

            DB::commit();

            return redirect()->route('student.show', $student)->with('success', 'Payment recorded successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Failed to record payment. Please try again.');
        }
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
