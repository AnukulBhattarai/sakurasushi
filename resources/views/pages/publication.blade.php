@extends('layouts.main')
@section('body')
    @isset($pageTitle)
        <x-global.breadcrumb :title="$pageTitle->title" />
    @else
        <x-global.breadcrumb title="Publications" />
    @endisset

    <div class="it-course-area p-relative grey-bg pt-120 pb-120">
        <div class="container">
            <div class="row">
                @if (count($publications) == 0)
                    <div class="text-center" style="min-height: 40vh;">
                        No publications found!
                    </div>
                @else
                    @foreach ($publications as $publication)
                        <x-cards.publication-card :publication="$publication" />
                    @endforeach
                @endif
            </div>
            {{ $publications->links() }}

        </div>
    </div>
@endsection
