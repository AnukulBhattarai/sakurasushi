@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Interested Students" />

    <div class="container-fluid py-5">
        <div class="row">
            {{-- {{ dd($certificates) }} --}}
            <!-- Sidebar / Navigation Panel -->
            <x-student.sidebar />

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="edu-team-area team-area-1 gap-tb-text">
                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                        <h3 class="mb-0">Printed Certificates</h3>

                        <form method="GET" action="{{ route('certificate.index') }}" class="d-flex align-items-center gap-2">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control"
                                placeholder="Search certificates..." />
                            <a href="{{ route('certificate.index') }}" class="h-100">
                                <button class="btn btn-secondary h-100">
                                    Clear
                                </button>
                            </a>
                        </form>


                        {{-- <div class="it-course-button text-center">
                            <a class="it-btn" href="{{ route('student.create') }}">
                                <span>+ Add</span>
                            </a>
                        </div> --}}
                    </div>

                    <x-student.table :values="$certificates" view_route="certificate.show" status_route="certificate.status"
                        :hidden_field="['id', 'email', 'slug', 'created_at', 'extra', 'updated_at']" />
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
