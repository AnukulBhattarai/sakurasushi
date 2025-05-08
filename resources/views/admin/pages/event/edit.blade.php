@extends('admin.layout.main')
@section('title', 'Edit event')
@section('content')
    <div class="p-4">
        <h4>Edit event</h4>
        <form action="{{ route('event.update', [$event->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter event title" :oldvalue="$event->title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ $event->description }}</textarea>

            <x-admin.input name="location" label="Event location" placeholder="Enter event location" :oldvalue="$event->location" />

            <x-admin.input name="phone" label="Event Contact" type="number" placeholder="Enter event contact"
                :oldvalue="$event->phone" />

            <x-admin.input name="email" label="Event email" type="email" placeholder="Enter event email"
                :oldvalue="$event->email" />

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}">
            </div>


            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
