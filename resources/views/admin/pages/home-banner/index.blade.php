@extends('admin.layout.main')
@section('title', 'Banners')

@section('actions')
    <x-admin.modal-add-form name="addBanner" title="Add banner">

        <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Banner Title" placeholder="Enter banner title" />

            <x-admin.input name="sub_title" label="Banner description" placeholder="Enter banner sub title" />

            {{-- <x-admin.input name="link" label="Banner Video Link" placeholder="Enter video Link" /> --}}

            <x-admin.input name="background" label="Select Image" type="file" placeholder="Select Background Image" />

            {{-- <x-admin.input name="button_text" label="Button Text" placeholder="Enter Button Text" /> --}}

            {{-- <x-admin.input name="button_link" label="Button Link" placeholder="Enter Button Link" /> --}}

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$banner" edit_route="banner.edit" view_route="banner.show" delete_route="banner.destroy"
        :hidden_field="['id', 'extra', 'background', 'created_at', 'updated_at']" status_route="banner.status" />

@endsection
