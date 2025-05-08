@extends('admin.layout.main')
@section('title', 'Partners')

@section('actions')
    <x-admin.modal-add-form name="addSchool" title="Add Partner">

        <form action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Partner Name" placeholder="Enter Partner name" />

            <x-admin.input name="link" label="Partner Link" placeholder="Enter Partner Link" />

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$school" edit_route="school.edit" view_route="school.show" delete_route="school.destroy"
        :hidden_field="['id', 'slug', 'thumbnail', 'email', 'start_date', 'end_date', 'extra', 'created_at', 'updated_at']" status_route="school.status" />

@endsection
