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

                        <div class="d-flex gap-2 align-items-center">
                            <!-- Filter Buttons -->
                            <a href="{{ route('lead.index') }}"
                                class="btn btn-sm {{ request('status') === null ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                All
                            </a>
                            <a href="{{ route('lead.index', ['status' => 'pending']) }}"
                                class="btn btn-sm {{ request('status') === 'pending' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                Pending
                            </a>
                            <a href="{{ route('lead.index', ['status' => 'joined']) }}"
                                class="btn btn-sm {{ request('status') === 'joined' ? 'btn-secondary' : 'btn-outline-secondary' }}">
                                Joined
                            </a>

                            <!-- Add Button -->
                        </div>
                        <a class="it-btn ms-3" href="{{ route('lead.create') }}">
                            <span>+ Add</span>
                        </a>
                    </div>


                    <x-student.table :values="$leads" edit_route="lead.edit" delete_route="lead.destroy"
                        view_route="lead.show" status_route="lead.status" :hidden_field="['id', 'email', 'slug', 'created_at', 'extra', 'updated_at']" />
                </div>
            </div>
        </div>
    </div>
@endsection
