@extends('admin.layout.main')
@section('title', 'Resources')

@section('actions')

    <style>
        .nav-tabs {
            display: flex;
            width: 100%;
        }

        .nav-tabs .nav-item {
            flex: 1;
            text-align: center;
        }

        .nav-tabs .nav-link {
            width: 100%;
        }
    </style>


    <x-admin.modal-add-form name="addPublication" title="Add resource">

        <form action="{{ route('resource.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Resource Title" placeholder="Enter Resource title" />

            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item">
                    <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" data-tab="tab1">Detail
                        Page</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2" data-tab="tab2">File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab3-tab" data-bs-toggle="tab" href="#tab3" data-tab="tab3">Gallery</a>
                </li>
            </ul>

            <!-- Tabs Content -->
            <div class="tab-content mt-3">
                <div class="tab-pane fade show active" id="tab1">

                    <x-admin.input name="thumbnail" label="Select Thumbnail" type="file"
                        placeholder="Select Thumbnail" />

                    <p class="mt-3">Description</p>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter Resource description"
                        rows="15">{{ old('description') }}</textarea>

                    <input type="checkbox" name="type" hidden value="detail" class="form-check-input" id="tab1_check"
                        checked>
                </div>

                <div class="tab-pane fade" id="tab2">

                    <x-admin.input name="file" label="Select File" type="file" placeholder="Select File" />
                    <input type="checkbox" name="type" hidden value="file" class="form-check-input" id="tab2_check">
                </div>

                <div class="tab-pane fade" id="tab3">

                    <x-admin.input name="image[]" label="Select Image" multiple type="file" placeholder="Select Image" />

                    <input type="checkbox" name="type" hidden value="gallery" class="form-check-input" id="tab3_check">
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let tabs = document.querySelectorAll(".nav-link");

                // Function to check the checkbox when a tab is clicked
                tabs.forEach(tab => {
                    tab.addEventListener("click", function() {
                        let tabId = this.getAttribute("data-tab");

                        // Uncheck all checkboxes
                        document.querySelectorAll(".form-check-input").forEach(checkbox => {
                            checkbox.checked = false;
                        });

                        // Check the corresponding checkbox
                        document.getElementById(tabId + "_check").checked = true;
                    });
                });

                // Check the corresponding tab if the checkbox is checked
                document.querySelectorAll(".form-check-input").forEach(checkbox => {
                    if (checkbox.checked) {
                        let tabId = checkbox.id.replace("_check", "");
                        let tab = document.querySelector(`#${tabId}-tab`);
                        if (tab) {
                            new bootstrap.Tab(tab).show(); // Open the tab if checkbox is checked
                        }
                    }
                });
            });
        </script>

    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$resource" edit_route="resource.edit" view_route="resource.show" delete_route="resource.destroy"
        :hidden_field="['id', 'extra', 'created_at', 'updated_at', 'thumbnail', 'description']" status_route="resource.status" />

@endsection
