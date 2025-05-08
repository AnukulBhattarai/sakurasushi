@extends('admin.layout.main')
@section('title', 'Testimonials')

@section('actions')
    <x-admin.modal-add-form name="addPublication" title="Add testimonial">

        <form action="{{ route('testimonial.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Name" placeholder="Enter Name" />

            <x-admin.input name="company" label="Company" placeholder="Enter Company" />

            <x-admin.input name="designation" label="Designation" placeholder="Enter Designation" />

            <x-admin.input name="profile" label="Select Image" type="file" placeholder="Select Image" />

            <p class="mt-3">Message</p>
            <textarea class="form-control" name="message" id="description" placeholder="Enter Message" rows="15">{{ old('message') }}</textarea>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')


    <x-admin.table :values="$testimonial" edit_route="testimonial.edit" view_route="testimonial.show"
        delete_route="testimonial.destroy" :hidden_field="['id', 'extra', 'profile', 'created_at', 'updated_at']" status_route="testimonial.status" />

@endsection
