@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Detail" />


    <div class="container py-5">
        <div class="row">
            <x-student.sidebar />
            <div class="col-md-9">
                <div class="card shadow rounded-4 p-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Certificate Details</h2>
                            <div>
                                <div class="container text-center my-5">
                                    <button class="btn btn-warning" onclick="printCertificate()">
                                        Print Certificate
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Certificate No:</strong></div>
                            <div class="col-md-8">{{ $certificate->certificate_no }}</div>
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
                            <div class="col-md-8">{{ $student->program->first()->title ?? 'N/A' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Total Fees</strong></div>
                            <div class="col-md-8">₹{{ $program->price }}</div>
                        </div>

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


    <div id="certificate" class="d-none">
        <style>
            @media print {
                @page {
                    size: A4;
                    margin: 0;
                }

                html,
                body {
                    margin: 0;
                    padding: 0;
                    width: 210mm;
                    height: 297mm;
                }

                .certificate-wrapper {
                    position: relative;
                    width: 210mm;
                    height: 297mm;
                    overflow: hidden;
                }

                .certificate-wrapper img {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    /* object-fit: cover; */
                    /* THIS makes sure it fills the area */
                }

                .overlay-text {
                    position: absolute;
                    width: 100%;
                    color: black;
                    font-weight: bold;
                    text-align: center;
                }

                .name {
                    top: 24%;
                    font-size: 34px;
                }

                .course {
                    top: 35%;
                    font-size: 34px;
                }

                .performance {
                    top: 48%;
                    font-size: 34px;
                }

                .duration {
                    top: 40.8%;
                    left: -39px;
                    font-size: 16px;
                }

                .month {
                    top: 56.8%;
                    left: 8%;
                    font-size: 24px;
                }

                .certificateNumber {
                    top: 73.3%;
                    left: 36.5%;
                    font-size: 18px;
                }

                .studentId {
                    top: 73.3%;
                    left: -17.8%;
                    font-size: 18px;
                }
            }
        </style>

        <div class="certificate-wrapper">
            <img src="{{ asset('file/certificate.jpg') }}" alt="Certificate Background">

            <div class="overlay-text name">{{ $student->name }}</div>
            <div class="overlay-text course">{{ $student->program->first()->title ?? 'Course Title' }}</div>
            <div class="overlay-text performance">{{ $student->performance ?? 'Excellent' }}</div>
            <div class="overlay-text duration">{{ $student->program->first()->duration ?? '3 Months' }}</div>
            <div class="overlay-text month">{{ $student->created_at->format('F Y') }}</div>
            <div class="overlay-text certificateNumber">{{ $certificate->certificate_no }}</div>
            <div class="overlay-text studentId">{{ $student->id }}</div>
        </div>
    </div>



    <script>
        function printCertificate() {
            const certificate = document.getElementById('certificate');
            const originalContent = document.body.innerHTML;

            certificate.classList.remove('d-none');
            const certificateHTML = certificate.innerHTML;

            // Replace body content with certificate only
            document.body.innerHTML = certificateHTML;

            setTimeout(() => {
                window.print();

                // After print dialog closes, restore the original page content
                setTimeout(() => {
                    document.body.innerHTML = originalContent;
                }, 500);
            }, 200);
        }
    </script>
@endsection
