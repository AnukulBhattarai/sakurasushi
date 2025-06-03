@extends('admin.layout.main')
@section('title', 'Edit Video')
@section('content')
    <div class="p-4">
        <h4>Edit Video</h4>
        <form action="{{ route('video.update', [$video->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$video->title" />
            <x-admin.input name="link" label="Video" placeholder="Enter Video Link" :oldvalue="$video->link" />

            <p class="mt-3">Source</p>
            <select name="source" class="form-control">
                <option value="null">select</option>
                <option value="youtube" @if ($video->source == 'youtube') selected @endif>YouTube</option>
                <option value="facebook" @if ($video->source == 'facebook') selected @endif>Facebook</option>
            </select>

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
