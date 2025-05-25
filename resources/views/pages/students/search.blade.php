@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Search" />

    <div class="container py-5">
        <div class="row">

            <x-student.sidebar />

            <div class="col-md-9">
                <h2 class="mb-4">Search Students</h2>

                <div class="mb-3">
                    <input type="text" id="student-search" class="form-control" placeholder="Type student name..." />
                </div>
                <div id="student-table-wrapper">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('student-search');
            const tableWrapper = document.getElementById('student-table-wrapper');
            let timer;

            searchInput.addEventListener('input', function() {
                clearTimeout(timer);
                const query = this.value.trim();

                if (query.length < 2) {
                    return;
                }

                timer = setTimeout(() => {
                    fetch(`/students/table?q=${encodeURIComponent(query)}`)
                        .then(response => response.text())
                        .then(html => {
                            tableWrapper.innerHTML = html;
                        })
                        .catch(error => {
                            console.error('Error loading student table:', error);
                        });
                }, 300);
            });
        });
    </script>
@endsection
