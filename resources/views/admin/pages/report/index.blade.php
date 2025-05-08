@extends('admin.layout.main')
@section('title', 'Reports')

@section('actions')
    <x-admin.modal-add-form name="addReport" title="Add report">

        <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Report Title" placeholder="Enter report title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter news description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="file" label="File" type="file" />

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />

            <p class="mt-3">Publication</p>
            <select name="publication_id" class="form-control">
                <option value="null">Select Publication</option>
                @foreach ($publications as $publication)
                    <option value="{{ $publication->id }}">{{ $publication->title }}</option>
                @endforeach
            </select>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$report" edit_route="report.edit" view_route="report.show" delete_route="report.destroy"
        :hidden_field="['id', 'extra', 'created_at', 'updated_at']" status_route="report.status" />

@endsection
