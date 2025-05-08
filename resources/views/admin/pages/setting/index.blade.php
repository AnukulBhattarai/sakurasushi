@extends('admin.layout.main')
@section('title', 'Settings')

@section('actions')
    <x-admin.modal-add-form name="addSetting" title="Add setting">

        <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Setting Title" placeholder="Enter setting title" />

            <x-admin.input name="display_name" label="Display Name" placeholder="Enter display name" />

            <x-admin.input name="key" label="key" placeholder="Enter key" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter blog description" rows="15">{{ old('description') }}</textarea>

            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div id="sections" class="sections">

            </div>

            <button type="button" class="btn btn-success my-4" onclick="addSections()">Add Sections</button>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>


        </form>
    </x-admin.modal-add-form>
    <script>
        function addSections() {
            const sections = document.getElementById('sections');
            const newSection = document.createElement('div');
            newSection.innerHTML = `
                        <x-admin.input name="section_title[]" label="Section Title"
                            placeholder="Enter Section title" />
                        <x-admin.input-textarea name="section_desc[]" id="description" label="Section description" />
                    <button type="button" class="btn btn-danger my-3" onclick="this.parentElement.remove()">Remove</button>
                    `;
            sections.appendChild(newSection);
        }
    </script>
@endsection

@section('content')



    <x-admin.table :values="$setting" edit_route="setting.edit" view_route="setting.show" delete_route="setting.destroy"
        :hidden_field="['id', 'slug', 'email', 'sections', 'start_date', 'end_date', 'extra', 'created_at', 'updated_at']" status_route="setting.status" />

@endsection
