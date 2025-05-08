@extends('admin.layout.main')
@section('title', 'Edit Title')
@section('content')
    <div class="p-4">
        <h4>Edit Title</h4>
        <form action="{{ route('pageTitle.update', [$pageTitle->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$pageTitle->title" />

            <p class="mt-3">Page</p>
            <select name="page" class="form-control">
                <option value="null">Select Page</option>
                <option value="about" @if ($pageTitle->page == 'about') selected @endif>About</option>
                <option value="school" @if ($pageTitle->page == 'school') selected @endif>Partners</option>
                <option value="program" @if ($pageTitle->page == 'program') selected @endif>Programs</option>
                <option value="career" @if ($pageTitle->page == 'career') selected @endif>Career</option>
                <option value="service" @if ($pageTitle->page == 'service') selected @endif>Service</option>
                <option value="team" @if ($pageTitle->page == 'team') selected @endif>Team</option>
                <option value="publication" @if ($pageTitle->page == 'publication') selected @endif>Publications</option>
                <option value="blog" @if ($pageTitle->page == 'blog') selected @endif>Blogs</option>
                <option value="contact" @if ($pageTitle->page == 'contact') selected @endif>Contact</option>
            </select>


            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
