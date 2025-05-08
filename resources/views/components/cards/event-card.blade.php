@props(['event'])
<div class="col-xl-4 col-lg-6 col-md-6 mb-30">
    <div class="it-event-2-item-box">
        <div class="it-event-2-item">
            <div class="it-event-2-thumb fix">
                <a href="{{ route('event.detail', $event->id) }}">
                    <div>
                        <div style="height: 280px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $event->thumbnail) }}"
                                style="height: 100%; width:100%; object-fit:cover;" alt="">
                        </div>
                    </div>
                </a>
                <div class="it-event-2-date">
                    <span><i>{{ \Carbon\Carbon::parse($event->date)->format('d') }}</i> <br />
                        {{ strtoupper(\Carbon\Carbon::parse($event->date)->format('M')) }}
                </div>
            </div>
            <div class="it-event-2-content">
                <h4 class="it-event-2-title">
                    <a href="{{ route('event.detail', $event->id) }}">{{ $event->title }}</a>
                </h4>
                <div class="it-event-2-text">
                    {!! Str::limit($event->description, 100, '...') !!}
                </div>
                <div class="it-event-2-meta">
                    <span>
                        <a href="#">
                            <i class="fa-light fa-location-dot"></i>
                        </a>
                        Location: {{ $event->location }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
