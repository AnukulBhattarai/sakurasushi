@extends('admin.layout.main')
@section('title', 'Team Category')

@section('actions')
    <x-admin.modal-add-form name="addHeader" title="Add Team Category">

        <form action="{{ route('teamCategory.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="Name" placeholder="Enter Name" type="text" required />

            <x-admin.input name="order" label="Display Order" placeholder="Enter Order" type="text" required />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$teamCategory" edit_route="teamCategory.edit" view_route="teamCategory.show"
        delete_route="teamCategory.destroy" :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="teamCategory.status" />

@endsection
