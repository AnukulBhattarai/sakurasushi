@extends('admin.layout.main')
@section('title', 'Edit Category')
@section('content')
    <div class="p-4">
        <h4>Edit Category</h4>
        <form action="{{ route('teamCategory.update', [$teamCategory->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter Name" :oldvalue="$teamCategory->name" />

            <x-admin.input name="order" label="Display Order" placeholder="Enter Order" :oldvalue="$teamCategory->order" />

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
