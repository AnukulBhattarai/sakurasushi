@extends('admin.layout.main')
@section('title', 'Edit Organization')
@section('content')
    <div class="p-4">


        <form action="{{ route('organization.update', [$organization->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="Full name" placeholder="Enter Full Name" :oldvalue="$organization->name" />
            <x-admin.input name="address" label="Address" placeholder="Enter Address" :oldvalue="$organization->address" />
            <x-admin.input name="phone" label="Phone" placeholder="Enter Phone" :oldvalue="$organization->phone" />
            <x-admin.input name="mobile" label="Mobile Number" placeholder="Enter Mobile Number" :oldvalue="$organization->mobile" />
            <x-admin.input name="email" label="Email" placeholder="Enter email" :oldvalue="$organization->email" />

            <x-admin.input name="slogan" label="Slogan" placeholder="Enter slogan" :oldvalue="$organization->other['slogan'] ?? ''" />

            <div class="mt-3">
                <p class="mb-2">Existing Logo</p>
                @isset($organization->logo)
                    <img src="{{ asset('storage/' . $organization->logo) }}" alt="" srcset="" width="300px"
                        style="aspect-ration:4/3;object-fit:cover;">
                @endisset
            </div>
            <x-admin.input type="file" name="logo" label="Logo" placeholder="Select Logo" />

            <p class="mt-3">Map</p>
            <textarea class="form-control" name="location" id="location" rows="5">{{ old('', $organization->location) }}</textarea>

            <p class="mt-5 text-muted">Social Links</p>
            <x-admin.input type="url" name="facebook" label="Facebook" placeholder="Enter Facebook Profile Link"
                :oldvalue="$organization->facebook" />
            <x-admin.input type="url" name="instagram" label="Instagram" placeholder="Enter Instagram Profile Link"
                :oldvalue="$organization->instagram" />
            <x-admin.input type="url" name="linkedin" label="Linkedin" placeholder="Enter Linkedin Profile Link"
                :oldvalue="$organization->linkedin" />
            <x-admin.input type="url" name="twitter" label="Twitter" placeholder="Enter Twitter Profile Link"
                :oldvalue="$organization->twitter" />

            <div class="mt-3">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>

@endsection
