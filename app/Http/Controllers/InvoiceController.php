<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::query();

        if ($request->filled('q')) {
            $query->where('invoice_no', 'like', '%' . $request->input('q') . '%');
        }
        $invoices = $query->latest()->simplePaginate(15);

        return view('pages.invoice.index', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        $student = $invoice->student;
        $program = $invoice->program;
        return view('pages.invoice.show', compact('invoice', 'student', 'program'));
    }

    public function invoice(Request $request)
    {
        $request->validate([
            'invoice_no' => 'required|string',
            'student_id' => 'required|integer|exists:students,id',
            'program_id' => 'required|integer|exists:programs,id',
        ]);
        $invoice = Invoice::create([
            'invoice_no' => $request->invoice_no,
            'student_id' => $request->student_id,
            'program_id' => $request->program_id,
        ]);
        return redirect()->back()->withSuccess('The invoice has been created successfully!');
    }
}
