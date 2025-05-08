@extends('admin.layout.main')
@section('title', 'Edit publication')
@section('content')
    <div class="p-4">
        <h4>Edit publication</h4>
        <form action="{{ route('publication.update', [$publication->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter publication title" :value="$publication->title" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
