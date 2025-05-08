@extends('admin.layout.main')
@section('title', 'Add Organization')
@section('content')
    <div class="p-4">

        <h4>Add Organization</h4>
        <form action="{{ route('organization.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Full name" placeholder="Enter Full Name" />
            <x-admin.input name="address" label="Address" placeholder="Enter Address" />
            <x-admin.input name="phone" label="Phone" placeholder="Enter Phone" />
            <x-admin.input name="mobile" label="Mobile Number" placeholder="Enter Mobile Number" />
            <x-admin.input name="email" label="Email" placeholder="Enter email" />
            <x-admin.input type="file" name="logo" label="Logo" placeholder="Select Logo" />

            <p class="mt-5 text-muted">Social Links</p>
            <x-admin.input type="url" name="facebook" label="Facebook" placeholder="Enter Facebook Profile Link" />
            <x-admin.input type="url" name="instagram" label="Instagram" placeholder="Enter Instagram Profile Link" />
            <x-admin.input type="url" name="linkedin" label="Linkedin" placeholder="Enter Linkedin Profile Link" />
            <x-admin.input type="url" name="twitter" label="Twitter" placeholder="Enter Twitter Profile Link" />
            {{-- <x-admin.input type="url" name="other" label="Other" placeholder="Enter Any Other Profile Link" /> --}}

            <div class="mt-3">
                <input type="submit" value="Add" class="btn btn-success">
            </div>
        </form>
    </div>

@endsection
