@extends('admin.layout.main')
@section('title', 'Headers')

@section('actions')
    <x-admin.modal-add-form name="addHeader" title="Add Video">

        <form action="{{ route('header.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Title" placeholder="Enter Title" type="text" required />

            <x-admin.input name="subtitle" label="Subtitle" placeholder="Enter Subtitle" required />

            <p class="mt-3">Section</p>
            <select name="section" class="form-control">
                <option value="null">Select Section</option>
                <option value="school">School</option>
                <option value="program">Programs</option>
                <option value="team">Team</option>
                <option value="testimonial">Testimonials</option>
                <option value="publication">Publications</option>
                <option value="blog">Blogs</option>
                <option value="apply">Apply</option>
                <option value="gallery">Gallery</option>
                <option value="contact">Contact</option>
            </select>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$header" edit_route="header.edit" view_route="header.show" delete_route="header.destroy"
        :hidden_field="['id', 'slug', 'created_at', 'extra', 'updated_at']" status_route="header.status" />

@endsection
