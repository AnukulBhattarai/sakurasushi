@extends('admin.layout.main')
@section('title', 'Careers')

@section('actions')
    <x-admin.modal-add-form name="addCareer" title="Add career">

        <form action="{{ route('career.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Career Title" placeholder="Enter career title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="salary" label="Company Salary" placeholder="Enter salary" />

            <x-admin.input name="location" label="Company Location" placeholder="Enter location" />

            <x-admin.input name="type" label="Career Type" placeholder="Enter career type" />

            <x-admin.input name="term" label="Career Term" placeholder="Enter career term" />


            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$data" edit_route="career.edit" view_route="career.show" delete_route="career.destroy"
        :hidden_field="['id', 'slug', 'email', 'start_date', 'end_date', 'extra', 'created_at', 'updated_at']" status_route="career.status" />

@endsection
