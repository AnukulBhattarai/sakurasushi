@extends('admin.layout.main')
@section('title', 'Edit Gallery')
@section('content')

    <div class="p-4">
        <h4>Edit Gallery</h4>
        <form action="{{ route('gallery.update', ['gallery' => $gallery->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="name" label="gallery name" placeholder="Enter gallery name" :oldvalue="$gallery->name" />

            <p class="mt-4">Existing Images</p>
            <div class="ms-5 my-3">
                @foreach ($gallery->image as $image)
                    {{-- <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset=""> --}}
                    <div class="mt-2 row">
                        <div class="col-9">
                            <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                                alt="" srcset="">
                        </div>
                        <div class="col-3">
                            @php
                                $modelClassName = get_class($gallery);
                            @endphp
                            <a href="{{ route('detach.image', ['model_type' => $modelClassName, 'model_id' => $gallery->id, 'image' => $image->id]) }}"
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
