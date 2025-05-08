@extends('admin.layout.main')
@section('title', 'Dashboard')

@section('content')

    <div class="row p-3">
        {{-- @foreach ($data as $key => $value)
            <x-admin.dashboard-card :title="$key" :numbers="$value" :viewroute="$key" />
        @endforeach --}}
        dashboard
    </div>

    {{-- <div class="row p-3">
        <div class="col-md-4 col-12">
            <div class="mt-3">
                <h5 class="mb-3">Home Page Banner</h5>
                @if (isset($homepage_config['other']))
                    <div class="d-flex  mt-3">

                        @isset($homepage_config['other']['background_image1'])
                            <img src="{{ asset('storage/' . $homepage_config['other']['background_image1']) }}" alt=""
                                class="me-3" srcset="" style="aspect-ratio:16/9;height:10vw;">
                        @endisset
                        @isset($homepage_config['other']['background_image2'])
                            <img src="{{ asset('storage/' . $homepage_config['other']['background_image2']) }}" alt=""
                                class="me-3" srcset="" style="aspect-ratio:16/9;height:10vw;">
                        @endisset
                        @isset($homepage_config['other']['background_image3'])
                            <img src="{{ asset('storage/' . $homepage_config['other']['background_image3']) }}" alt=""
                                class="me-3" srcset="" style="aspect-ratio:16/9;height:10vw;">
                        @endisset
                    </div>
                    <a href="{{ route('homepage_configuration_edit') }}" class="mt-3 btn btn-outline-primary">Change</a>
                @else
                    <a href="{{ route('homepage_configuration_add') }}" class="mt-3 btn btn-outline-primary">Add</a>
                @endif
            </div>
        </div>
    </div> --}}


@endsection
