@extends('admin.layout.main')
@section('title', 'Edit program')
@section('content')
    <div class="p-4">
        <h4>Edit program</h4>
        <form action="{{ route('program.update', [$program->id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <x-admin.input name="title" label="Event Title" placeholder="Enter course title" :oldvalue="$program->title" />

            <x-admin.input name="duration" label="course Duration" placeholder="Enter course duration" :oldvalue="$program->duration" />

            <x-admin.input name="instructor" label="Course instructor" placeholder="Enter course instructor"
                :oldvalue="$program->instructor" />

            <x-admin.input name="price" label="Course price" placeholder="Enter Course price" :oldvalue="$program->price" />

            <x-admin.input name="discount" label="Course Discount Percentage" placeholder="Enter Course Discount"
                :oldvalue="$program->discount" />

            <x-admin.input name="skill" label="Course Skill Level" placeholder="Enter Course Skill Level"
                :oldvalue="$program->extra['skill'] ?? ''" />

            <x-admin.input name="class_day" label="Course Class Days" placeholder="Enter Class Days" :oldvalue="$program->extra['class_day'] ?? ''" />

            <x-admin.input name="language" label="Course Language" placeholder="Enter Course Language" :oldvalue="$program->extra['language'] ?? ''" />

            <p class="mt-3">Category</p>
            <select name="category_id" class="form-control">
                <option value="null">select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $program->category_id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter course description"
                rows="15">{{ $program->description }}</textarea>

            <p class="mt-3">Curriculum</p>
            <textarea class="form-control" name="curriculum" id="description" placeholder="Enter course curriculum" rows="15">{{ $program->extra['curriculum'] ?? '' }}</textarea>


            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $program->thumbnail) }}" height="200px" width="auto" class="px-3"
                        alt="" srcset="">
                </div>
            </div>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />


            <div class="mt-5">
                <input type="submit" value="Update" class="btn btn-success px-4 py-2 ">
            </div>

        </form>
    </div>

@endsection
