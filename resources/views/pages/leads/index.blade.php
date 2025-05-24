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
                            <a class="it-btn" href="{{ route('lead.create') }}">
                                <span>+ Add</span>
                            </a>
                        </div>
                    </div>

                    <x-student.table :values="$leads" edit_route="lead.edit" delete_route="lead.destroy"
                        status_route="lead.status" :hidden_field="['id', 'email', 'slug', 'created_at', 'extra', 'updated_at']" />
                </div>
            </div>
        </div>
    </div>
@endsection
