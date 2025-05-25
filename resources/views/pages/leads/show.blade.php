@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Detail" />
    {{-- {{ dd($student) }} --}}

    {{-- {{ dd($lead) }} --}}

    <div class="container py-5">
        <div class="row">
            <x-student.sidebar />
            <div class="col-md-9">
                <div class="card shadow rounded-4 p-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="mb-0">Interested Student Details</h2>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Name:</strong></div>
                            <div class="col-md-8">{{ $lead->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Email:</strong></div>
                            <div class="col-md-8">{{ $lead->email ?? '-' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Phone:</strong></div>
                            <div class="col-md-8">{{ $lead->phone ?? '-' }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Visited At:</strong></div>
                            <div class="col-md-8">{{ $lead->date_of_visit }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Interested Course</strong></div>
                            <div class="col-md-8">{{ $lead->program->title }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
