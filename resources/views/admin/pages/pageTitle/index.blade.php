@extends('admin.layout.main')
@section('title', 'Page Titles')

@section('actions')
    <x-admin.modal-add-form name="addHeader" title="Add Page Title">

        <form action="{{ route('pageTitle.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Title" placeholder="Enter Title" type="text" required />

            <p class="mt-3">Page</p>
            <select name="page" class="form-control">
                <option value="null">Select Page</option>
                <option value="about">About</option>
                <option value="school">Partners</option>
                <option value="program">Programs</option>
                <option value="career">Career</option>
                <option value="service">Service</option>
                <option value="team">Team</option>
                <option value="publication">Publications</option>
                <option value="blog">Blogs</option>
                <option value="contact">Contact</option>
            </select>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$pageTitle" edit_route="pageTitle.edit" view_route="pageTitle.show"
        delete_route="pageTitle.destroy" :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="pageTitle.status" />

@endsection
