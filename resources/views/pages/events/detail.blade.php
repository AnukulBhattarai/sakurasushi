@extends('layouts.main')
@section('body')
    <x-global.breadcrumb :title="$event->title" />

    <div class="it-event-details-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="it-evn-details-wrap">
                        <div class="it-evn-details-thumb mb-35" style="height: 500px; overflow: hidden">
                            <img src="{{ asset('storage/' . $event->thumbnail) }}"
                                style="height: 100%; width:100%; object-fit:cover;" alt="" />
                        </div>
                        <h4 class="it-evn-details-title">
                            {{ $event->title }}
                        </h4>
                        <div class="postbox__meta">
                            @isset($event->location)
                                <span><i class="fa-light fa-location-dot"></i>{{ $event->location }}</span>
                            @endisset
                        </div>
                        <div class="it-evn-details-text">
                            <h6 class="it-evn-details-title-sm pb-10">
                                Event Description
                            </h6>
                            {!! $event->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="it-evn-sidebar-box">
                        <div class="it-evn-sidebar-list">
                            <ul>
                                @isset($event->date)
                                    <li>
                                        <i class="me-2 fa-light fa-calendar-days"></i>
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M, Y') }}
                                    </li>
                                @endisset
                                @isset($event->location)
                                    <li>
                                        <i class="me-2 fa-light fa-location-dot"></i>
                                        <a href="#">{{ $event->location }}</a>
                                    </li>
                                @endisset

                                @isset($event->email)
                                    <li>
                                        <i class="me-2 fa-light fa-envelope"></i>
                                        <a href="mailto:{{ $event->email }}">{{ $event->email }}</a>
                                    </li>
                                @endisset
                                @isset($event->phone)
                                    <li>
                                        <i class="me-2 fa-light fa-phone"></i>
                                        <a href="tel:{{ $event->phone }}">{{ $event->phone }}</a>
                                    </li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
