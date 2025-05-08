@extends('admin.layout.main')
@section('title', 'Edit Video')
@section('content')
    <div class="p-4">
        <h4>Edit Video</h4>
        <form action="{{ route('header.update', [$header->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$header->title" />

            <x-admin.input name="subtitle" label="Subtitle" placeholder="Enter Subtitle" :oldvalue="$header->subtitle" />


            <p class="mt-3">Section</p>
            <select name="section" class="form-control">
                <option value="null">Select Section</option>
                <option value="school" {{ $header->section == 'school' ? 'selected' : '' }}>School</option>
                <option value="program" {{ $header->section == 'program' ? 'selected' : '' }}>Programs</option>
                <option value="team" {{ $header->section == 'team' ? 'selected' : '' }}>Team</option>
                <option value="testimonial" {{ $header->section == 'testimonial' ? 'selected' : '' }}>Testimonials</option>
                <option value="publication" {{ $header->section == 'publication' ? 'selected' : '' }}>Publications</option>
                <option value="blog" {{ $header->section == 'blog' ? 'selected' : '' }}>Blogs</option>
                <option value="apply" {{ $header->section == 'apply' ? 'selected' : '' }}>Apply</option>
                <option value="gallery" {{ $header->section == 'gallery' ? 'selected' : '' }}>Gallery</option>
                <option value="contact" {{ $header->section == 'contact' ? 'selected' : '' }}>Contact</option>
            </select>

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
