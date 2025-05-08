@extends('admin.layout.main')
@section('title', 'Edit Banner')
@section('content')
    <div class="p-4">
        <h4>Edit banner</h4>
        <form action="{{ route('banner.update', [$banner->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter banner title" :oldvalue="$banner->title" />

            <x-admin.input name="sub_title" label="Banner subtitle" placeholder="Enter banner sub title" :oldvalue="$banner->sub_title" />

            {{-- <x-admin.input name="link" label="Banner Video Link" placeholder="Enter banner video" :oldvalue="$banner->link" /> --}}


            <p class="mt-4">Existing Background Image</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $banner->background) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="background" label="Select Image" type="file" placeholder="Select Background Image" />

            {{-- <x-admin.input name="button_text" label="Button Text" placeholder="Enter Button Text" :oldvalue="$banner->button_text" />

            <x-admin.input name="button_link" label="Button Link" placeholder="Enter Button Link" :oldvalue="$banner->button_link" /> --}}

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
