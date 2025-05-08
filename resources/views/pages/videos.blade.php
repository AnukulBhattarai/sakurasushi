@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Videos" />

    <!--<< Program Details Section Start >>-->
    <section class="program-details-section fix section-padding">
        <div class="container">
            <div class="container">
                <div class="row">
                    @if (count($videos) == 0)
                        <div class="text-center" style="min-height: 40vh;">
                            No videos found!
                        </div>
                    @else
                        @foreach ($videos as $video)
                            <x-cards.video-card :title="$video->title" :link="$video->link" :source="$video->source" />
                        @endforeach
                    @endif
                </div>
                {{ $videos->links() }}
            </div>
        </div>
    </section>
@endsection
