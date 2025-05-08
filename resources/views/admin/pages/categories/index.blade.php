@extends('admin.layout.main')
@section('title', 'Category')

@section('actions')
    <x-admin.modal-add-form name="addHeader" title="Add Category">

        <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="name" placeholder="Enter name" type="text" required />

            <x-admin.input name="icon" label="Icon" placeholder="Enter Icon" type="text" required />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$categories" edit_route="category.edit"  delete_route="category.destroy"
        :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="category.status" />

@endsection
