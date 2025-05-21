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
                        <h3 class="mb-0">Students</h3>
                        <div class="it-course-button text-center">
                            <a class="it-btn" href="{{ route('student.create') }}">
                                <span>+ Add</span>
                            </a>
                        </div>
                    </div>

                    <x-student.table :values="$students" edit_route="student.edit" delete_route="student.destroy"
                        view_route="student.show" status_route="student.status" :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" />
                </div>
            </div>
        </div>
    </div>
@endsection
