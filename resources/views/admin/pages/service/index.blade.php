@extends('admin.layout.main')
@section('title', 'Services')

@section('actions')
    <x-admin.modal-add-form name="addService" title="Add service">

        <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Service Title" placeholder="Enter service title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />


            <x-admin.input name="image[]" label="Select Image" multiple type="file" placeholder="Select Image" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$service" edit_route="service.edit" view_route="service.show" delete_route="service.destroy"
        :hidden_field="['id', 'slug', 'email', 'start_date', 'end_date', 'extra', 'created_at', 'updated_at']" status_route="service.status" />

@endsection
