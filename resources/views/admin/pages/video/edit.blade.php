@extends('admin.layout.main')
@section('title', 'Edit Video')
@section('content')
    <div class="p-4">
        <h4>Edit Video</h4>
        <form action="{{ route('video.update', [$video->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$video->title" />
            <x-admin.input name="link" label="Video" placeholder="Enter Video Link" :oldvalue="$video->link" />


            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
