@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Detail" />
    {{-- {{ dd($program) }} --}}

    <div class="container py-5">
        <div class="row">
            <x-student.sidebar />
            <div class="col-md-9">
                <div class="card shadow rounded-4 p-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Student Details</h2>
                            <div>
                                <div class="container text-center my-5">
                                    <button onclick="printInvoice()" class="btn btn-secondary">
                                        Print Invoice
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Name:</strong></div>
                            <div class="col-md-8">{{ $invoice->invoice_no }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Name:</strong></div>
                            <div class="col-md-8">{{ $student->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Email:</strong></div>
                            <div class="col-md-8">{{ $student->email ?? '-' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Phone:</strong></div>
                            <div class="col-md-8">{{ $student->phone ?? '-' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Joined At:</strong></div>
                            <div class="col-md-8">{{ $student->created_at->format('d M Y') }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Program:</strong></div>
                            <div class="col-md-8">{{ $program->title }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Total Fees</strong></div>
                            <div class="col-md-8">₹{{ $program->price }}</div>
                        </div>

                        @php
                            $discountAmount = ($program->price * $program->discount) / 100;
                        @endphp
                        <div class="d-flex justify-content-center">
                            <a href="{{ url()->previous() }}" class="btn px-3 mt-4"
                                style="background-color: #005174;color:#fff; font-size: 20px;">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Hidden Invoice Template -->
    <div id="invoice" class="d-none">
        <style>
            .invoice-wrapper {
                width: 800px;
                margin: auto;
                padding: 40px;
                background: #fff;
                border: 1px solid #ccc;
                font-family: 'Arial', sans-serif;
                color: #333;
            }

            .invoice-header {
                border-bottom: 2px solid #333;
                margin-bottom: 30px;
                padding-bottom: 10px;
            }

            .invoice-title {
                font-size: 28px;
                margin-bottom: 3px;
                font-weight: bold;
                text-align: center;
            }

            .invoice-center {
                font-size: 18px;
                margin-bottom: 5px;
                text-align: center;
            }

            .invoice-details {
                margin-bottom: 20px;
            }

            .invoice-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            .invoice-table th,
            .invoice-table td {
                border: 1px solid #ccc;
                padding: 8px;
                text-align: left;
            }

            .invoice-total {
                text-align: right;
                margin-top: 20px;
                font-size: 18px;
                font-weight: bold;
            }
        </style>

        <div class="invoice-wrapper">
            <div class="invoice-header ">
                <div>
                    <div class="invoice-title">{{ $organization->name }}</div>
                    <div class="invoice-center">{{ $organization->address }}</div>
                    <div class="invoice-center">Phone: {{ $organization->phone }}</div>
                    <div class="invoice-center">Email: {{ $organization->email }}</div>
                </div>
                <div class="text-end">
                    <div><small>Date: {{ now()->toDateString() }}</small></div>
                    <div><small>Invoice No: {{ $invoice->invoice_no }}</small></div>
                </div>
                <h3>Invoice Bill</h3>
            </div>
            <div class="invoice-details">
                <div>Name: {{ $student->name }}</div>
                <div>Phone: {{ $student->phone }}</div>
                <div>Email: {{ $student->email }}</div>
                <div>Print Date: {{ now()->format('Y-m-d\TH:i') }}</div>
            </div>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $program->title }}</td>
                        <td>1</td>
                        <td>₹{{ number_format($program->price, 2) }}</td>
                        <td>₹{{ number_format($program->price, 2) }}</td>

                    </tr>
                </tbody>
            </table>


            <div class="invoice-total">
                Discount: ₹{{ $discountAmount }}
            </div>

            <div class="invoice-total">
                Grand Total: ₹{{ number_format($program->price - $discountAmount, 2) }}
            </div>
        </div>
        {{-- <form id="invoiceForm" method="POST" action="{{ route('invoice') }}">
            @csrf
            <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
            <input type="hidden" name="program_id" id="course_id" value="{{ $student->program->first()->id ?? '' }}">
            <input type="hidden" name="invoice_no" id="invoice_number" value="{{ $invoiceNumber }}">
        </form> --}}
    </div>

    <script>
        function printInvoice(studentId, courseId, invoiceNumber) {
            const invoice = document.getElementById('invoice');
            const originalContent = document.body.innerHTML;

            // Show invoice (in case it's hidden)
            invoice.classList.remove('d-none');
            const invoiceHTML = invoice.innerHTML;

            // Replace body content with invoice only
            document.body.innerHTML = invoiceHTML;

            // Wait briefly to let DOM update
            setTimeout(() => {
                window.print();

                // After printing, restore original page content
                setTimeout(() => {
                    document.body.innerHTML = originalContent;
                }, 500);
            }, 200);
        }
    </script>
@endsection
