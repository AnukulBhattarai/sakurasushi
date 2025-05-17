@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Interested Students" />

    <div class="edu-team-area team-area-1 gap-tb-text">
        <div class="container py-5">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Interested Students</h3>
                <div class="it-course-button text-center">
                    <a class=it-btn href={{ route('lead.create') }}>
                        <span>
                            + Add
                        </span>
                    </a>
                </div>
            </div>

            <x-student.table :values="$leads" edit_route="lead.edit" delete_route="lead.destroy" status_route="lead.status"
                :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" />
        </div>
    </div>
@endsection
