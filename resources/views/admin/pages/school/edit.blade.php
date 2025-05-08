@extends('admin.layout.main')
@section('title', 'Edit Partner')
@section('content')
    <div class="p-4">
        <h4>Edit school</h4>
        <form action="{{ route('school.update', [$school->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="Partner Name" placeholder="Enter partner name" :oldvalue="$school->name" />

            <x-admin.input name="link" label="Partner Link" placeholder="Enter partner Link" :oldvalue="$school->link" />

            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $school->thumbnail) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
