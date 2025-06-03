@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Detail" />
    {{-- {{ dd($student) }} --}}

    <div class="container py-5">
        <div class="row">
            <x-student.sidebar />
            {{-- {{ dd($student->created_at->format('F Y')) }} --}}
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
                                    @php
                                        $latestId = \App\Models\Invoice::latest('id')->value('id');
                                        if ($latestId) {
                                            $invoiceNumber = 'INV-' . str_pad($latestId + 1, 3, '0', STR_PAD_LEFT);
                                        } else {
                                            $invoiceNumber = 'INV-001';
                                        }
                                    @endphp

                                    @php
                                        $certificate = \App\Models\Certificate::latest('id')->value('id');
                                        if ($certificate) {
                                            $certificateNumber = 'S-' . str_pad($certificate + 1, 3, '0', STR_PAD_LEFT);
                                        } else {
                                            $certificateNumber = 'S-001';
                                        }
                                    @endphp
                                    <button class="btn btn-warning" onclick="printCertificate()">
                                        Print Cooking Certificate
                                    </button>

                                </div>
                            </div>
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
                            <div class="col-md-4"><strong>Total Fees</strong></div>
                            <div class="col-md-8">₹{{ $student->program->first()->price }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Fees Due</strong></div>
                            <div class="col-md-8">₹{{ $student->payment_remaining }}</div>
                        </div>


                        {{-- Enrolled Programs --}}
                        <div class="card shadow rounded-4 mb-4">
                            <div class="card-body">
                                <h4 class="mb-3">Enrolled Programs</h4>

                                @if ($student->program->isEmpty())
                                    <p class="text-muted">No programs enrolled.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Program</th>
                                                <th>Enrolled At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->program as $course)
                                                <tr>
                                                    <td>{{ $course->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($course->pivot->enrolled_at)->format('d M Y') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>

                        {{-- Payment History --}}
                        <div class="card shadow rounded-4 mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mb-0">Payment History</h4>
                                    <!-- Add Payment Button -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addPaymentModal">
                                        + Add Payment
                                    </button>
                                </div>

                                @if ($student->payments->isEmpty())
                                    <p class="text-muted">No payments recorded.</p>
                                @else
                                    <table class="table table-bordered">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Amount</th>
                                                <th>Paid On</th>
                                                <th>Method</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student->payments as $payment)
                                                <tr>
                                                    <td>₹{{ number_format($payment->amount, 2) }}</td>
                                                    <td>{{ $payment->paid_at }}</td>
                                                    <td>{{ ucfirst($payment->method) ?? '-' }}</td>
                                                    <td>{{ $payment->note ?? '-' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url()->previous() }}" class="btn px-3"
                                style="background-color: #005174;color:#fff; font-size: 20px;">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('payments.store', $student->id) }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addPaymentModalLabel">Add Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="paid_at" class="form-label">Paid On</label>
                        <input type="date" name="paid_at" class="form-control" value="{{ now()->toDateString() }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="method" class="form-label">Payment Method</label>
                        <input type="text" name="method" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Note (Optional)</label>
                        <textarea name="note" class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save Payment</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
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
            <div class="invoice-header d-flex justify-content-between">
                <div>
                    <div class="invoice-title">{{ $organization->name }}</div>
                    <div class="invoice-center">{{ $organization->address }}</div>
                    <div class="invoice-center">Phone: {{ $organization->phone }}</div>
                    <div class="invoice-center">Email: {{ $organization->email }}</div>
                </div>
                <div class="text-end">
                    <div><small>Date: {{ now()->toDateString() }}</small></div>
                    <div><small>Invoice No: {{ $invoiceNumber }}</small></div>
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
                    @foreach ($student->program as $course)
                        <tr>
                            <td>{{ $course->title }}</td>
                            <td>1</td>
                            <td>₹{{ number_format($course->price, 2) }}</td>
                            <td>₹{{ number_format($course->price, 2) }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="invoice-total">
                Discount: 00
            </div>

            <div class="invoice-total">
                Grand Total: $275.00
            </div>
        </div>
        <form id="invoiceForm" method="POST" action="{{ route('invoice') }}">
            @csrf
            <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
            <input type="hidden" name="program_id" id="course_id" value="{{ $student->program->first()->id ?? '' }}">
            <input type="hidden" name="invoice_no" id="invoice_number" value="{{ $invoiceNumber }}">
        </form>
    </div>

    <div id="certificate" class="d-none">
        <style>
            .certificate-wrapper {
                position: relative;
                width: 1000px;
                margin: auto;
                font-family: Arial, sans-serif;
                text-align: center;
            }

            .certificate-wrapper img {
                width: 100%;
                height: auto;
                object-fit: contain;
            }

            .overlay-text {
                position: absolute;
                width: 100%;
                color: black;
                font-weight: bold;
            }

            .name {
                top: 21%;
                font-size: 28px;
            }

            .course {
                top: 34%;
                font-size: 28px;
            }

            .performance {
                top: 48%;
                font-size: 28px;
            }

            .duration {
                top: 40.2%;
                left: 65px;
                font-size: 20px;
            }

            .month {
                top: 55.8%;
                left: 16%;
                font-size: 24px;
            }
        </style>

        <div class="certificate-wrapper">
            <img src="{{ asset('file/certificate.jpg') }}" alt="Certificate Background">

            <div class="overlay-text name">{{ $student->name }}</div>
            <div class="overlay-text course">{{ $student->program->first()->title ?? 'Course Title' }}</div>
            <div class="overlay-text performance">{{ $student->performance ?? 'Excellent' }}</div>
            <div class="overlay-text duration">{{ $student->program->first()->duration ?? '3 Months' }}</div>
            <div class="overlay-text month">{{ $student->created_at->format('F Y') }}</div>
        </div>

        <!-- Hidden form to submit after print -->
        <form id="certificateForm" method="POST" action="{{ route('certificate') }}">
            @csrf
            <input type="hidden" name="certificate_no" value="{{ $certificateNumber }}">
            <input type="hidden" name="student_id" value="{{ $student->id }}">
            <input type="hidden" name="program_id" value="{{ $student->program->first()->id ?? '' }}">
        </form>
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

                // After printing, wait a bit before restoring and confirming
                setTimeout(() => {
                    document.body.innerHTML = originalContent;

                    if (confirm("Did you print the invoice? Click OK to continue.")) {
                        document.getElementById('invoiceForm').submit();
                    }
                }, 500);
            }, 200);
        }



        function printCertificate() {
            const certificate = document.getElementById('certificate');
            const originalContent = document.body.innerHTML;

            certificate.classList.remove('d-none');
            const certificateHTML = certificate.innerHTML;

            // Replace body content with certificate only
            document.body.innerHTML = certificateHTML;

            setTimeout(() => {
                window.print();

                // After print dialog closes, redirect or submit form
                setTimeout(() => {
                    // Restore the page (optional)
                    document.body.innerHTML = originalContent;

                    // Now redirect or submit form — you consider this "print confirmed"
                    // For example: submit form
                    if (confirm("Did you print the certificate? Click OK to continue.")) {
                        // User confirmed printing
                        document.getElementById('certificateForm').submit();
                    }

                    // OR redirect like:
                    // window.location.href = '/your-route';
                }, 500);

            }, 200);
        }
    </script>
@endsection
