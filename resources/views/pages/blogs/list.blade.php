@extends('layouts.main')
@section('body')
    @isset($pageTitle)
        <x-global.breadcrumb :title="$pageTitle->title" />
    @else
        <x-global.breadcrumb title="Blogs" />
    @endisset

    <div class="it-blog-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $blog)
                    <x-cards.blog-card :blog="$blog" />

                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <strong>No blogs available at the moment.</strong>
                        </div>
                    </div>
                @endforelse

                {{ $blogs->links() }}
            </div>
        </div>
    </div>
@endsection
