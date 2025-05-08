@extends('admin.layout.main')
@section('title', 'Edit Notice')
@section('content')
    <div class="p-4">
        <h4>Edit Notice</h4>
        <form action="{{ route('notice.update', $notice->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-admin.input name="link" type="url" label="news link" placeholder="Enter news link" :oldvalue="$notice->link" />

            <p class="mt-4">Existing Thumbnail</p>
            <div class="ms-5 my-3">
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $notice->thumbnail) }}" height="200px" width="auto" class="px-3"
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
