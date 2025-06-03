@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Videos" />

    {{-- {{ dd($videos) }} --}}


    <!--<< Program Details Section Start >>-->
    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
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
@endsection
