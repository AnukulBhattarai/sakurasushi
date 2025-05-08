@extends('admin.layout.main')
@section('title', 'Edit career')
@section('content')

    <div class="p-4">
        <h4>Edit career</h4>
        <form action="{{ route('career.update', [$career->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter career title" :oldvalue="$career->title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Career description" rows="15">{{ $career->description }}</textarea>

            <x-admin.input name="salary" label="Company Salary" placeholder="Enter salary" :oldvalue="$career->extra['salary'] ?? ''" />

            <x-admin.input name="location" label="Company Location" placeholder="Enter location" :oldvalue="$career->extra['location']" />

            <x-admin.input name="type" label="Career Type" placeholder="Enter career type" :oldvalue="$career->extra['type']" />

            <x-admin.input name="term" label="Career Term" placeholder="Enter career term" :oldvalue="$career->extra['term']" />


            @isset($career->extra['thumbnail'])
                <p class="mt-4">Existing Thumbnail</p>
                <div class="ms-5 my-3">
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $career->extra['thumbnail']) }}" height="200px" width="auto"
                            class="px-3" alt="" srcset="">
                    </div>
                </div>
            @endisset

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
