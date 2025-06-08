@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Interested Students" />

    <div class="container-fluid py-5">
        <div class="row">
            <!-- Sidebar / Navigation Panel -->
            <x-student.sidebar />

            <!-- Main Content -->
            <div class="col-md-9">
                <form method="GET" action="{{ route('student.index') }}"
                    class="d-flex align-items-center justify-content-between gap-2 flex-wrap mb-4">
                    {{-- Payment Status Filter --}}
                    <div class="btn-group" role="group" aria-label="Payment Status">
                        <button type="submit" name="payment_status" value=""
                            class="btn btn-outline-secondary {{ request('payment_status') === null ? 'active' : '' }}">
                            All
                        </button>
                        <button type="submit" name="payment_status" value="paid"
                            class="btn btn-outline-secondary {{ request('payment_status') === 'paid' ? 'active' : '' }}">
                            Paid
                        </button>
                        <button type="submit" name="payment_status" value="due"
                            class="btn btn-outline-secondary {{ request('payment_status') === 'due' ? 'active' : '' }}">
                            Due
                        </button>
                    </div>

                    {{-- Status Filter --}}
                    <div class="btn-group " role="group" aria-label="Status Filter">
                        <button type="submit" name="status" value=""
                            class="btn btn-outline-primary {{ request('status') === null ? 'active' : '' }}">
                            All
                        </button>
                        <button type="submit" name="status" value="current"
                            class="btn btn-outline-primary {{ request('status') === 'current' ? 'active' : '' }}">
                            Current
                        </button>
                        <button type="submit" name="status" value="completed"
                            class="btn btn-outline-primary {{ request('status') === 'completed' ? 'active' : '' }}">
                            Completed
                        </button>
                    </div>
                </form>

                <div class="edu-team-area team-area-1 gap-tb-text">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                        <h3 class="mb-0">Students</h3>

                        <form method="GET" action="{{ route('student.index') }}" class="d-flex align-items-center gap-2">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                placeholder="Search students..." />
                            <a href="{{ route('student.index') }}" class="h-100">
                                <button class="btn btn-secondary h-100">
                                    Clear
                                </button>
                            </a>
                        </form>


                        <div class="it-course-button text-center">
                            <a class="it-btn" href="{{ route('student.create') }}">
                                <span>+ Add</span>
                            </a>
                        </div>
                    </div>

                    <x-student.table :values="$students" edit_route="student.edit" delete_route="student.destroy"
                        view_route="student.show" status_route="student.status" :hidden_field="['id', 'email', 'type', 'slug', 'created_at', 'extra', 'updated_at']" />
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('q')) {
                // Clear the query string and update the input
                history.replaceState(null, '', window.location.pathname);
                document.querySelector('input[name="q"]').value = '';
            }
        });
    </script>
@endsection
