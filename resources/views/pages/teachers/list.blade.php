@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="Team" />

    <div class="edu-team-area team-area-1 gap-tb-text">
        <div class="container">
            <div class="row g-5">
                @forelse ($teams as $team)
                    <x-cards.teacher-card :team="$team" />
                @empty
                    <div class="col-lg-12">
                        <div class="alert alert-warning text-center">
                            <strong>No teachers found!</strong>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
