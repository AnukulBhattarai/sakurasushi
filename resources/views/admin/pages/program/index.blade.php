@extends('admin.layout.main')
@section('title', 'Courses')

@section('actions')
    <x-admin.modal-add-form name="addProgram" title="Add Course">

        <form action="{{ route('program.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Course Title" placeholder="Enter Course title" />

            <x-admin.input name="duration" label="Course Duration" placeholder="Enter Course duration" />

            <p class="mt-3">Category</p>
            <select name="category_id" class="form-control">
                <option value="null">select</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <x-admin.input name="instructor" label="Course instructor" placeholder="Enter course instructor" />

            <x-admin.input name="price" label="Course price" placeholder="Enter Course price" />

            <x-admin.input name="discount" label="Course Discount Percentage" placeholder="Enter Course Discount" />

            <x-admin.input name="skill" label="Course Skill Level" placeholder="Enter Course Skill Level" />

            <x-admin.input name="class_day" label="Course Class Days" placeholder="Enter Class Days" />

            <x-admin.input name="language" label="Course Language" placeholder="Enter Course Language" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ old('description') }}</textarea>

            <p class="mt-3">Curriculum</p>
            <textarea class="form-control" name="curriculum" id="description" placeholder="Enter course curriculum" rows="15">{{ old('curriculum') }}</textarea>

            <x-admin.input name="thumbnail" label="Select Thumbnail" type="file" placeholder="Select Thumbnail" />


            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
    </x-admin.modal-add-form>
@endsection

@section('content')



    <x-admin.table :values="$program" edit_route="program.edit" view_route="program.show" delete_route="program.destroy"
        :hidden_field="[
            'id',
            'duration',
            'discount',
            'age_group',
            'method',
            'thumbnail',
            'extra',
            'created_at',
            'updated_at',
        ]" status_route="program.status" />

@endsection
