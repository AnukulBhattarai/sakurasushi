@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Student Search" />

    <div class="container py-5">
        <h2 class="mb-4">Search Students</h2>

        <div class="mb-3">
            <input type="text" id="student-search" class="form-control" placeholder="Type student name..." />
        </div>

        <ul id="student-results" class="list-group shadow-sm"></ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('student-search');
            const resultsList = document.getElementById('student-results');
            let timer;

            searchInput.addEventListener('input', function() {
                clearTimeout(timer);
                const query = this.value.trim();

                if (query.length < 2) {
                    resultsList.innerHTML = '';
                    return;
                }

                timer = setTimeout(() => {
                    fetch(`/students/search?q=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            resultsList.innerHTML = '';

                            if (data.length === 0) {
                                resultsList.innerHTML =
                                    '<li class="list-group-item text-muted">No students found</li>';
                                return;
                            } else {
                                data.forEach(student => {
                                    const item = document.createElement('a');
                                    item.href =
                                        `/student-management/students/show/${student.id}`;
                                    item.className =
                                        'list-group-item list-group-item-action d-flex justify-content-between align-items-center';
                                    item.innerHTML = `
                                        <div>
                                            <strong>${student.name}</strong><br>
                                            <small class="text-muted">${student.email}</small>
                                        </div>
                                        <i class="fa fa-arrow-right text-secondary"></i>
                                    `;
                                    resultsList.appendChild(item);
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching students:', error);
                        });
                }, 300);
            });
        });
    </script>
@endsection
