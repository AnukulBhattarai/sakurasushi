@extends('admin.layout.main')
@section('title', 'Gallery')
@section('actions')
    <x-admin.modal-add-form name="addblog" title="Add Gallery">

        <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="Gallery Name" placeholder="Enter gallery name" />

            <x-admin.input name="image[]" label="Select Image" multiple type="file" placeholder="Select Image" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>

    </x-admin.modal-add-form>
@endsection

@section('content')

    <x-admin.table :values="$gallery" status_route="gallery.status" edit_route="gallery.edit" delete_route="gallery.destroy"
        view_route="gallery.show" :hidden_field="['id', 'slug', 'order', 'extra', 'created_at', 'updated_at']" />

@endsection
