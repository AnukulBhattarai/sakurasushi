@extends('admin.layout.main')
@section('title', 'Edit Category')
@section('content')
    <div class="p-4">
        <h4>Edit Category</h4>
        <form action="{{ route('category.update', [$category->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Title" placeholder="Enter Title" type="text" required
                value="{{ $category->title }}" />

            <x-admin.input name="icon" label="Icon" placeholder="Enter Icon" type="text" required
                value="{{ $category->icon }}" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
