@extends('layouts.main')
@section('body')
    @isset($pageTitle)
        <x-global.breadcrumb :title="$pageTitle->title" />
    @else
        <x-global.breadcrumb title="Publications" />
    @endisset

    <!--<< Program Details Section Start >>-->
    <section class="program-details-section fix section-padding">
        <div class="container">
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
    </section>
@endsection
