@extends('layouts.main')

@section('body')
    <div class="container text-center my-5">
        <button onclick="printCertificate()" class="btn btn-warning">
            Print Cooking Certificate
        </button>
    </div>

    <div class="container text-center my-5">
        <button onclick="printInvoice()" class="btn btn-secondary">
            Print Sample Invoice
        </button>
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
                font-size: 32px;
                font-weight: bold;
            }

            .invoice-company {
                font-size: 18px;
                margin-bottom: 5px;
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
                    <div class="invoice-company">Arya Digital Production</div>
                    <small>123 Main St, Cityville, 12345</small><br>
                    <small>Email: info@aryadigital.com</small>
                </div>
                <div class="text-end">
                    <div class="invoice-title">INVOICE</div>
                    <div><small>Date: May 2, 2025</small></div>
                    <div><small>Invoice #: INV-00123</small></div>
                </div>
            </div>

            <div class="invoice-details">
                <strong>Billed To:</strong><br>
                Martin Odegaard<br>
                456 Client Ave<br>
                Cityville, 67890<br>
                Email: martin@example.com
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
                        <td>Cooking Course Enrollment</td>
                        <td>1</td>
                        <td>$250</td>
                        <td>$250</td>
                    </tr>
                    <tr>
                        <td>Recipe Booklet</td>
                        <td>1</td>
                        <td>$25</td>
                        <td>$25</td>
                    </tr>
                </tbody>
            </table>

            <div class="invoice-total">
                Grand Total: $275.00
            </div>
        </div>
    </div>



    <div id="certificate" class="d-none">
        <style>
            .cert-wrapper {
                width: 1000px;
                height: auto;
                padding: 60px 40px;
                margin: auto;
                border: 2px solid #333;
                font-family: 'Arial', sans-serif;
                background-color: #fdfaf6;
                color: #333;
                position: relative;
            }

            .cert-header img {
                height: 60px;
            }

            .cert-title {
                font-size: 28px;
                font-weight: bold;
                color: #333;
            }

            .cert-subtitle {
                font-size: 16px;
                margin-top: 10px;
                color: #555;
            }

            .cert-name {
                font-size: 36px;
                color: #e67e22;
                font-weight: bold;
                text-align: center;
                margin: 30px 0 10px;
            }

            .cert-course {
                font-size: 20px;
                font-weight: bold;
                color: #e67e22;
            }

            .cert-description {
                font-size: 16px;
                color: #444;
                margin-bottom: 20px;
            }

            .cert-footer {
                margin-top: 40px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .cert-signature {
                text-align: center;
            }

            .cert-signature hr {
                border-top: 1px solid #000;
                width: 180px;
            }

            .cert-badge img {
                height: 80px;
            }
        </style>

        <div class="cert-wrapper">
            <div class="d-flex justify-content-between align-items-center cert-header mb-4">
                <div>
                    <img src="https://img.icons8.com/emoji/48/chef-emoji.png" alt="Chef Association" />
                    <div>Chef<br><strong>Association</strong></div>
                </div>
                <div>
                    <img src="https://img.icons8.com/emoji/48/sun-emoji.png" alt="Chef School" />
                    <div>Chef<br><strong>School</strong></div>
                </div>
            </div>

            <div class="text-center">
                <div class="cert-title">CERTIFICATE IN COOKING</div>
                <div class="cert-subtitle">PROUDLY PRESENTED TO</div>
                <div class="cert-name">MARTIN ODEGARD</div>
                <div class="cert-description">Had successfully completed a 25 hours</div>
                <div class="cert-course">ADVANCE COOKING COURSE</div>
                <div class="cert-description mt-3">
                    between 16 April to 20 July 2025 and passed the prescribed assessments
                </div>
            </div>

            <div class="cert-footer">
                <div class="cert-signature">
                    <hr>
                    <strong>Chris</strong><br>
                    President of Chef Association
                </div>
                <div class="cert-badge">
                    <img src="https://img.icons8.com/emoji/96/golden-medal-emoji.png" alt="Best Badge" />
                </div>
                <div class="cert-signature">
                    <hr>
                    <strong>Sarah</strong><br>
                    Director of Chef School
                </div>
            </div>
        </div>
    </div>

    <script>
        function printCertificate() {
            const content = document.getElementById('certificate').innerHTML;
            const printWindow = window.open('', '', 'height=900,width=1200');
            printWindow.document.write('<html><head><title>Cooking Certificate</title>');
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
