@extends('layouts.main')
@section('body')
    <x-global.breadcrumb :title="$teacher->name" />

    <!--<< Team Details Section Start >>-->
    <section class="team-details-section fix section-padding pb-0">
        <div class="container">
            <div class="team-details-wrapper">
                <div class="team-author-items ">
                    <div class="thumb">
                        <img src="{{ asset('storage/' . $teacher->profile) }}" alt="img">
                    </div>
                    <div class="content">
                        <h2>{{ $teacher->name }}</h2>
                        <span>{{ $teacher->position }}</span>
                        @isset($teacher->extra['description'])
                            <p>{!! $teacher->extra['description'] !!}</p>
                        @endisset
                        <div class="social-icon d-flex align-items-center">

                            @isset($teacher->facebook)
                                <a href="{{ $teacher->facebook }}"><i class="fab fa-facebook-f"></i></a>
                            @endisset

                            @isset($teacher->instagram)
                                <a href="{{ $teacher->instagram }}"><i class="fa-brands fa-instagram"></i></a>
                            @endisset

                            @isset($teacher->twitter)
                                <a href="{{ $teacher->twitter }}"><i class="fab fa-twitter"></i></a>
                            @endisset

                            @isset($teacher->linkedin)
                                <a href="{{ $teacher->linkedin }}"><i class="fa-brands fa-linkedin-in"></i></a>
                            @endisset
                        </div>
                    </div>
                </div>
                {{-- <div class="details-info-items">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="info-content">
                                <h2>Professional Info</h2>
                                <p class="mb-3">
                                    Consectetur adipisicing elit, sed do eiusmod tempor is incididunt ut labore et dolore of
                                    magna aliqua. Ut enim ad minim veniam, made of owl the quis nostrud exercitation ullamco
                                    laboris nisi ut aliquip
                                </p>
                                <p>
                                    The is ipsum dolor sit amet consectetur adipiscing elit. Fusce eleifend porta arcu In
                                    hac augu ehabitasse the is platea augue thelorem turpoi dictumst. In lacus libero
                                    faucibus
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="progress-area">
                                <div class="progress-wrap">
                                    <div class="pro-items">
                                        <div class="pro-head">
                                            <h6 class="title">
                                                Creativity
                                            </h6>
                                            <span class="point">
                                                90%
                                            </span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-value"></div>
                                        </div>
                                    </div>
                                    <div class="pro-items">
                                        <div class="pro-head">
                                            <h6 class="title">
                                                Time Management
                                            </h6>
                                            <span class="point">
                                                70%
                                            </span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-value style-two"></div>
                                        </div>
                                    </div>
                                    <div class="pro-items">
                                        <div class="pro-head">
                                            <h6 class="title">
                                                Art and Carft
                                            </h6>
                                            <span class="point">
                                                55%
                                            </span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-value style-three"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
