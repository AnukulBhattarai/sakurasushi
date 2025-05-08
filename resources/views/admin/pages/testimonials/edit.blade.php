@extends('admin.layout.main')
@section('title', 'Edit testimonial')
@section('content')
    <div class="p-4">
        <h4>Edit testimonial</h4>
        <form action="{{ route('testimonial.update', [$testimonial->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="Name" placeholder="Enter Name" :oldvalue="$testimonial->name" />

            <x-admin.input name="company" label="Company" placeholder="Enter Company" :oldvalue="$testimonial->company" />

            <x-admin.input name="designation" label="Designation" placeholder="Enter Designation" :oldvalue="$testimonial->designation" />

            <p class="mt-4">Existing Images</p>
            <div class="ms-5 my-3">
                @isset($testimonial->profile)
                    <img src="{{ asset('storage/' . $testimonial->profile) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                @endisset

                <x-admin.input name="profile" label="Select Profile Image" type="file" placeholder="Select Profile" />
            </div>

            <p class="mt-3">Message</p>
            <textarea class="form-control" name="message" id="description" placeholder="Enter Message" rows="15">{{ $testimonial->message }}</textarea>

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
