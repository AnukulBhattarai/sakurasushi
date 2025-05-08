@extends('admin.layout.main')
@section('title', 'Edit publication')
@section('content')
    <div class="p-4">
        <h4>Edit publication</h4>
        <form action="{{ route('publication.update', [$publication->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter publication title" :oldvalue="$publication->title" />

            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $publication->thumbnail) }}" height="200px" width="auto"
                        class="px-3" alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

            <p class="mt-3">Existing File</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <object data="{{ asset('storage/' . $publication->file) }}" type="application/pdf" width="90%"
                        height="450px">
                        <embed src="{{ asset('storage/' . $publication->file) }}" type="application/pdf" />
                    </object>
                </div>
            </div>

            <x-admin.input name="file" label="Select File" type="file" placeholder="Select File" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
