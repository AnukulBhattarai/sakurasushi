@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Detail" />
    {{-- {{ dd($student) }} --}}

    <div class="container py-5">
        <div class="row">
            <x-student.sidebar />
            <div class="col-md-9">
                <div class="card shadow rounded-4 p-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Student Details</h2>
                            @if ($student->payment_remaining == 0)
                                <div>
                                    <div class="container text-center my-5">
                                        <button onclick="printInvoice()" class="btn btn-secondary">
                                            Print Invoice
                                        </button>
                                    </div>
                                </div>
                            @endif
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
                        <div class="card shadow rounded-4">
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
                    <div><small>Invoice No: INV-00123</small></div>
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
    </div>


    <script>
        function printInvoice() {
            const content = document.getElementById('invoice').innerHTML;
            const printWindow = window.open('', '', 'height=800,width=1000');
            printWindow.document.write('<html><head><title>Invoice</title>');
            printWindow.document.write(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">'
            );
            printWindow.document.write('</head><body style="margin:0;">');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection
