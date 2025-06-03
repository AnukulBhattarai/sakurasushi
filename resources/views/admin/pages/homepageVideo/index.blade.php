@extends('admin.layout.main')
@section('title', 'Videos')

@section('actions')
    <x-admin.modal-add-form name="addvideo" title="Add Video">

        <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Title" placeholder="Enter Title" type="text" required />

            <x-admin.input name="link" label="Video" placeholder="Enter Video Link" type="url" required />



            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$homepageVideo" edit_route="homepageVideo.edit" view_route="homepageVideo.show"
        delete_route="homepageVideo.destroy" :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="homepageVideo.status" />

@endsection
