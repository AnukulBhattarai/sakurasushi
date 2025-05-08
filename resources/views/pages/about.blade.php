@extends('layouts.main')
@section('body')
    <x-global.breadcrumb title="About Us" />


    @isset($about)
        <x-homepage.about :about="$about" />
    @endisset

    <x-homepage.counter />

    @isset($choose)
        <x-homepage.choose :choose="$choose" />
    @endisset


    @if ($testimonials->count() > 0)
        <x-homepage.testimonial :testimonials="$testimonials" />
    @endif
@endsection
