@extends('admin.layout.main')
@section('title', 'Videos')

@section('actions')
    <x-admin.modal-add-form name="addvideo" title="Add Video">

        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Title" placeholder="Enter Title" type="text" required />

            <x-admin.input name="link" label="Video" placeholder="Enter Video Link" type="url" required />

            <p class="mt-3">Source</p>
            <select name="source" class="form-control">
                <option value="null">select</option>
                <option value="youtube">YouTube</option>
                <option value="facebook">Facebook</option>
            </select>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$video" edit_route="video.edit" view_route="video.show" delete_route="video.destroy"
        :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="video.status" />

@endsection
