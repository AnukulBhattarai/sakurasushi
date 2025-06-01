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
                            <h2 class="mb-0">Certificate Details</h2>
                            <div>
                                <div class="container text-center my-5">
                                    <button class="btn btn-warning" onclick="printCertificate()">
                                        Print Cooking Certificate
                                    </button>

                                </div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Certificate No:</strong></div>
                            <div class="col-md-8">{{ $student->certificate_no }}</div>
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
                    </div>
                </div>
            </div>
        </div>
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
