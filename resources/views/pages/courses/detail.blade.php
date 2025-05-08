@extends('layouts.main')
@section('body')
    <x-global.breadcrumb :title="$course->title" />

    <div class="it-course-details-area pt-120 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="it-course-details-wrap">
                        <div class="it-evn-details-thumb mb-35" style="height: 450px; overflow: hidden">
                            <img src="{{ asset('storage/' . $course->thumbnail) }}"
                                style="height: 100%; width:100%; object-fit:cover;" alt="" />
                        </div>
                        <h4 class="it-evn-details-title mb-0 pb-5">
                            {{ $course->title }}
                        </h4>
                        <div class="postbox__meta">
                        </div>


                        <div class="it-course-details-nav pb-60">
                            <nav>
                                <div class="nav nav-tab" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">
                                        overview
                                    </button>
                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">
                                        curriculum
                                    </button>
                                </div>
                            </nav>
                        </div>
                        <div class="it-course-details-content">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab">
                                    <div class="it-course-details-wrapper">
                                        <div class="it-evn-details-text mb-40">
                                            <h6 class="it-evn-details-title-sm pb-5">
                                                Course Description
                                            </h6>
                                            <p>
                                                {!! $course->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="it-course-details-wrapper">
                                        <div class="it-evn-details-text mb-40">
                                            <h6 class="it-evn-details-title-sm pb-5">
                                                Course Curriculum
                                            </h6>
                                            @isset($course->extra['curriculum'])
                                                <p>
                                                    {!! $course->extra['curriculum'] !!}
                                                </p>
                                            @else
                                                <p>
                                                    No curriculum available for this course.
                                                </p>
                                            @endisset
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="it-evn-sidebar-box it-course-sidebar-box">
                        <div class="it-course-sidebar-rate-box pb-20">
                            <div class="it-course-sidebar-rate d-flex justify-content-between align-items-center">
                                <span>course fee</span>
                                <span class="rate"><i>Npr. {{ $course->price }}</i></span>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="it-btn w-100 text-center mb-20">
                            <span>
                                Contact Us
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        <div class="it-evn-sidebar-list">
                            <ul>
                                @isset($course->duration)
                                    <li><span>Duration</span><span>{{ $course->duration }}</span></li>
                                @endisset
                                @isset($course->instructor)
                                    <li><span>Instructor</span><span>{{ $course->instructor }}</span></li>
                                @endisset
                                <li><span>skill level</span><span>Basic</span></li>
                                <li><span>class day</span><span>Monday-friday</span></li>
                                <li><span>language</span><span>English</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
