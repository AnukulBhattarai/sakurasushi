@extends('admin.layout.main')
@section('title', 'Events')

@section('actions')
    <x-admin.modal-add-form name="addEvent" title="Add event">

        <form action="{{ route('event.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Event Title" placeholder="Enter event title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="location" label="Event location" placeholder="Enter event location" />

            <x-admin.input name="phone" label="Event Contact" type="number" placeholder="Enter event contact" />

            <x-admin.input name="email" label="Event email" type="email" placeholder="Enter event email" />

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <x-admin.input name="date" label="Event Date" type="date" placeholder="Enter event date" />

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$event" edit_route="event.edit" view_route="event.show" delete_route="event.destroy"
        :hidden_field="['id', 'slug', 'email', 'date', 'extra', 'created_at', 'updated_at']" status_route="event.status" />

@endsection
