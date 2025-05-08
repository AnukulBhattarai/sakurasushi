@extends('admin.layout.main')
@section('title', 'Edit publication')
@section('content')

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

    <div class="p-4">
        <h4>Edit publication</h4>
        <form action="{{ route('resource.update', $resource->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Resource Title" placeholder="Enter Resource title" :oldvalue="$resource->title" />


            <div class="tab-pane fade @if ($resource->type != 'detail') d-none @else show @endif" id="detail">

                <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

                <p class="mt-4">Existing Thumbnail</p>
                <div class="ms-5 my-3">
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $resource->thumbnail) }}" height="200px" width="auto"
                            class="px-3" alt="" srcset="">
                    </div>
                </div>

                <p class="mt-3">Description</p>
                <textarea class="form-control" name="description" id="description" placeholder="Enter Resource description"
                    rows="15">{{ old('', $resource->description) }}</textarea>

            </div>

            <div class="tab-pane fade @if ($resource->type != 'file') d-none @else show @endif" id="file">

                <p class="mt-3">Existing File</p>
                <div class="ms-5 my-3">
                    <div class="mt-2">
                        <object data="{{ asset('storage/' . $resource->extra) }}" type="application/pdf" width="90%"
                            height="300px">
                            <embed src="{{ asset('storage/' . $resource->extra) }}" type="application/pdf" />
                        </object>
                    </div>
                </div>

                <x-admin.input name="file" label="Select File" type="file" placeholder="Select File" />
            </div>
            <div class="tab-pane fade @if ($resource->type != 'gallery') d-none @else show @endif" id="gallery">

                @foreach ($resource->image as $image)
                    <div class="mt-5 row">
                        <div class="col-9">
                            <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                                alt="" srcset="">
                        </div>
                        <div class="col-3">
                            @php
                                $modelClassName = get_class($resource);
                            @endphp
                            <a href="{{ route('detach.image', ['model_type' => $modelClassName, 'model_id' => $resource->id, 'image' => $image->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach

                <x-admin.input name="image[]" multiple label="Select Image" type="file" placeholder="Select Image" />

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

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


@endsection
