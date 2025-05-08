@extends('admin.layout.main')
@section('title', 'Edit Organization')
@section('content')
    <div class="p-4">
        {{-- {{ dd($about) }} --}}


        <form action="{{ route('about.update', [$about->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Title" placeholder="Enter Title" :oldvalue="$about->title" />
            <x-admin.input name="sub_title" label="Sub Title" placeholder="Enter Sub Title" :oldvalue="$about->sub_title" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" rows="5">{{ old('', $about->description) }}</textarea>
            <div class="mt-3">
                <p class="mb-2">Existing Image</p>
                @isset($about->side_image)
                    <img src="{{ asset('storage/' . $about->side_image) }}" alt="" srcset="" width="300px"
                        style="aspect-ration:4/3;object-fit:cover;">
                @endisset
            </div>
            <x-admin.input type="file" name="side_image" label="Image" placeholder="Select Image" />

            <div class="mt-3">
                <input type="submit" value="Update" class="btn btn-success">
            </div>
        </form>
    </div>

@endsection
