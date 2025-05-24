@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Interested Students" />

    <div class="container-fluid py-5">
        <div class="row">
            <!-- Sidebar / Navigation Panel -->
            <x-student.sidebar />

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="edu-team-area team-area-1 gap-tb-text">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="mb-0">Interested Students</h3>
                        <div class="it-course-button text-center">
                            {{-- <a class="it-btn" href="{{ route('payment.create') }}">
                                <span>+ Add</span>
                            </a> --}}
                        </div>
                    </div>
                    <form method="GET" action="{{ route('payments.index') }}" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="date" name="start_date" class="form-control"
                                value="{{ request('start_date', $startDate) }}">
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="end_date" class="form-control"
                                value="{{ request('end_date', $endDate) }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('payments.index') }}" class="btn btn-secondary w-100">Reset</a>
                        </div>
                    </form>

                    <x-student.table :values="$payments" status_route="lead.status" :hidden_field="['id', 'email', 'slug', 'created_at', 'extra', 'updated_at']" />
                </div>
            </div>
        </div>
    </div>
@endsection
