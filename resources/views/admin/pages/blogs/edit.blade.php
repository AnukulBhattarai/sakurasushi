@extends('admin.layout.main')
@section('title', 'Edit News')
@section('content')
    <div class="p-4">
        <h4>Edit News</h4>
        <form action="{{ route('blog.update', [$blog->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="news title" placeholder="Enter news title" :oldvalue="$blog->title" />

            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />


            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" rows="5">{{ old('', $blog->description) }}</textarea>

            <div class="ms-5 my-3">
                @foreach ($blog->image as $image)
                    {{-- <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset=""> --}}
                    <div class="mt-2 row">
                        <div class="col-9">
                            <img src="{{ asset('storage/' . $image->image) }}" height="200px" width="auto" class="px-3"
                                alt="" srcset="">
                        </div>
                        <div class="col-3">
                            @php
                                $modelClassName = get_class($blog);
                            @endphp
                            <a href="{{ route('detach.image', ['model_type' => $modelClassName, 'model_id' => $blog->id, 'image' => $image->id]) }}"
                                class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach

                <x-admin.input type="file" multiple name="images[]" label="Select Image" />
            </div>

            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </div>

@endsection
