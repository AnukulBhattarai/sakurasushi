@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Events" />

    <div class="it-event-2-area it-event-style-3 p-relative pt-90 pb-90">
        <div class="container">
            <div class="row">
                @forelse ($events as $event)
                    <x-cards.event-card :event="$event" />

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <strong>No events available at the moment.</strong>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
