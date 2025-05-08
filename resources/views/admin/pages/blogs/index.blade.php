@extends('admin.layout.main')
@section('title', 'News')

@section('actions')
    <x-admin.modal-add-form name="addblog" title="Add News">

        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="News Title" placeholder="Enter news title" />

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter news description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="image[]" label="Select Image" multiple type="file" placeholder="Select Image" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$blog" edit_route="blog.edit" view_route="blog.show" delete_route="blog.destroy"
        :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="blog.status" />

@endsection
