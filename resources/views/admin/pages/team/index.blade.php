@extends('admin.layout.main')
@section('title', 'team')

@section('actions')
    <x-admin.modal-add-form name="addteam" title="Add team">

        <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="name" label="team name" placeholder="Enter team name" />
            <x-admin.input name="position" label="team position" placeholder="Enter team position" />

            <x-admin.input name="facebook" label="team facebook" placeholder="Enter team facebook" />
            <x-admin.input name="instagram" label="team instagram" placeholder="Enter team instagram" />
            <x-admin.input name="linkedin" label="team linkedin" placeholder="Enter team linkedin" : />
            <x-admin.input name="twitter" label="team twitter" placeholder="Enter team twitter" />

            <x-admin.input name="profile" label="Select Image" type="file" placeholder="Select Image" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$team" edit_route="team.edit" view_route="team.show" delete_route="team.destroy"
        :hidden_field="[
            'id',
            'slug',
            'extra',
            'team_category_id',
            'facebook',
            'instagram',
            'linkedin',
            'twitter',
            'created_at',
            'updated_at',
        ]" status_route="team.status" />

@endsection
