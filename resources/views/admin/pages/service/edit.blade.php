@extends('admin.layout.main')
@section('title', 'Edit service')
@section('content')
    <div class="p-4">
        <h4>Edit service</h4>
        <form action="{{ route('service.update', [$service->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="service Title" placeholder="Enter service title" :oldvalue="$service->title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter service description" rows="15">{{ $service->description }}</textarea>

            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $service->thumbnail) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />


            <div class="ms-5 my-3">
                @foreach ($service->image as $image)
                    {{-- <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset=""> --}}
                    <div class="mt-2 row">
                        <div class="col-9">
                            <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                                alt="" srcset="">
                        </div>
                        <div class="col-3">
                            @php
                                $modelClassName = get_class($service);
                            @endphp
                            <a href="{{ route('detach.image', ['model_type' => $modelClassName, 'model_id' => $service->id, 'image' => $image->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach

                <x-admin.input type="file" multiple name="image[]" label="Select Image" />
            </div>

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
