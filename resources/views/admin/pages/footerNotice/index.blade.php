@extends('admin.layout.main')
@section('title', 'Notice')

@section('actions')
    <x-admin.modal-add-form name="addnotice" title="Add Notice">

        <form action="{{ route('notice.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="link" type="url" label="Notice Link" placeholder="Enter news link" />

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$notice" edit_route="notice.edit" view_route="notice.show" delete_route="notice.destroy"
        :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="notice.status" />

@endsection
