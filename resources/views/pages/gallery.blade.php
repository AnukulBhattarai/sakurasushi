@extends('layouts.main')

@section('body')
    <x-global.breadcrumb title="Gallery" />

    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                @forelse ($albums as $album)
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="it-course-item">
                            <div class="it-course-thumb mb-20 p-relative">
                                <a href="{{ route('gallery.detail', $album->id) }}" style="height: 300px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $album->image[0]->image) }}"
                                        style="height: 100%; width:100%; object-fit:cover;" alt="Gallery">
                                </a>
                            </div>
                            <div class="it-course-content">
                                <h4 class="it-course-title pb-5">
                                    <a href="{{ route('gallery.detail', $album->id) }}">{{ $album->name }}</a>
                                </h4>
                                <div class=" pb-15 mb-25 d-flex justify-content-between">
                                    <span> <i class="fa-solid fa-images me-2"></i>{{ $album->image->count() }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <strong>No albums available at the moment.</strong>
                        </div>
                    </div>
                @endforelse
                {{ $albums->links() }}
            </div>
        </div>
    </div>
@endsection
