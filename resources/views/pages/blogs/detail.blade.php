@extends('layouts.main')
@section('meta')
@endsection
@section('body')
    <x-global.breadcrumb :title="$blog->title" />

    <div class="postbox__area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="postbox__details-wrapper">
                        <article>
                            <div class="postbox__thumb mb-30 w-img" style="height: 550px; overflow: hidden">
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                    style="height: 100%; width:100%; object-fit:cover;" alt="" />
                            </div>
                            <div class="postbox__details-title-box pb-40">
                                <div class="postbox__meta">
                                    <span><i class="fa-solid fa-calendar-days"></i>
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('d F Y') }}</span>
                                </div>
                                <h4 class="postbox__title mb-20">
                                    {{ $blog->title }}
                                </h4>
                                {!! $blog->description !!}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
