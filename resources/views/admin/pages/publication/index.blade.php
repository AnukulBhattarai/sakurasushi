@extends('admin.layout.main')
@section('title', 'Publications')

@section('actions')
    <x-admin.modal-add-form name="addPublication" title="Add publication">

        <form action="{{ route('publication.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Publication Title" placeholder="Enter publication title" />

            <x-admin.input name="file" label="File" type="file" />

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$publication" edit_route="publication.edit" view_route="publication.show"
        delete_route="publication.destroy" :hidden_field="['id', 'extra', 'created_at', 'updated_at']" status_route="publication.status" />

@endsection
