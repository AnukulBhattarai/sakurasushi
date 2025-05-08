@extends('admin.layout.main')
@section('title', 'Edit service')
@section('content')
    <div class="p-4">
        <h4>Edit service</h4>

        <form action="{{ route('setting.update', [$setting->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="title" label="Setting Title" placeholder="Enter setting title" :oldvalue="$setting->title" />

            <x-admin.input name="display_name" label="Display Name" placeholder="Enter display name" :oldvalue="$setting->display_name" />

            <x-admin.input name="key" label="key" placeholder="Enter key" :oldvalue="$setting->key" />

            <p class="mt-3">Description</p>
            <textarea class="form-control" name="description" id="description" placeholder="Enter Setting description"
                rows="15">{{ $setting->description }}</textarea>
            @isset($setting->extra['thumbnail'])
                <p class="mt-4">Existing Thumbnail</p>
                <div class="ms-5 my-3">
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $setting->extra['thumbnail']) }}" height="200px" width="auto"
                            class="px-3" alt="" srcset="">
                    </div>
                </div>
            @endisset
            <x-admin.input name="thumbnail" label="Select Image" type="file" placeholder="Select Thumbnail" />

            <div id="sections" class="sections">
                @isset($setting->sections)
                    @foreach ($setting->sections as $item)
                        <div class="single-section mb-4 border p-3 rounded"> <!-- 👈 wrapping div -->
                            <x-admin.input name="section_title[]" label="Section Title" :oldvalue="$item['title']"
                                placeholder="Enter section title" />
                            <x-admin.input-textarea name="section_desc[]" id="description" label="Section description"
                                :oldvalue="$item['description']" />
                            <button type="button" class="btn btn-danger my-3"
                                onclick="this.closest('.single-section').remove()">Remove</button>
                        </div>
                    @endforeach
                @endisset
            </div>


            <button type="button" class="btn btn-success my-4" onclick="addSections()">Add Sections</button>

            <div class="mt-5">
                <input type="submit" value="Add" class="btn btn-success px-4 py-2 ">
            </div>
        </form>
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
    </div>

@endsection
