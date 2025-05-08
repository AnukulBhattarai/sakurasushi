@extends('admin.layout.main')
@section('title', 'Edit team')
@section('content')
    <div class="p-4">
        <h4>Edit team</h4>
        <form action="{{ route('team.update', [$team->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="team name" placeholder="Enter team name" :oldvalue="$team->name" />
            <x-admin.input name="position" label="team position" placeholder="Enter team position" :oldvalue="$team->position" />

            <x-admin.input name="facebook" label="team facebook" placeholder="Enter team facebook" :oldvalue="$team->facebook" />
            <x-admin.input name="instagram" label="team instagram" placeholder="Enter team instagram" :oldvalue="$team->instagram" />
            <x-admin.input name="linkedin" label="team linkedin" placeholder="Enter team linkedin" :oldvalue="$team->linkedin" />
            <x-admin.input name="twitter" label="team twitter" placeholder="Enter team twitter" :oldvalue="$team->twitter" />

            <p class="mt-4">Existing Images</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $team->profile) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>

                <x-admin.input name="profile" label="Select Profile Image" type="file" placeholder="Select Profile" />
            </div>
            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
