@extends('layouts.main')
@section('body')
    <main>
        @isset($homeBanner)
            <x-homepage.hero :banner="$homeBanner" />
        @endisset

        @if ($categories->count() > 0)
            <x-homepage.categories :categories="$categories" />
        @endif

        @if ($courses->count() > 0)
            <x-homepage.courses :courses="$courses" />
        @endif

        @isset($about)
            <x-homepage.about :about="$about" />
        @endisset

        <x-homepage.advertisement />

        @isset($choose)
            <x-homepage.choose :choose="$choose" />
        @endisset

        <x-homepage.counter />

        @if ($testimonials->count() > 0)
            <x-homepage.testimonial :testimonials="$testimonials" />
        @endif

        @if ($team->count() > 0)
            <x-homepage.team :team="$team" />
        @endif
        {{-- <x-homepage.team /> --}}

        @if (count($blogs) > 0)
            <x-homepage.blogs :blogs="$blogs" />
        @endif

        <div class="it-newsletter-area it-newsletter-height fix p-relative theme-bg">
            <div class="it-newsletter-shape-1 d-none d-lg-block">
                <img src="assets/img/newsletter/shape-1-1.png" alt="">
            </div>
            <div class="it-newsletter-shape-2 d-none d-lg-block">
                <img src="assets/img/newsletter/shape-1-2.png" alt="">
            </div>
            <div class="it-newsletter-shape-3 d-none d-xl-block">
                <img src="assets/img/newsletter/shape-1-3.png" alt="">
            </div>
            <div class="it-newsletter-shape-4 d-none d-xl-block">
                <img src="assets/img/newsletter/shape-1-4.png" alt="">
            </div>
            <div class=container>
                <div class=row>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class=it-newsletter-left>
                            <h4 class="it-section-title text-white pb-20">Join Our Newsletter</h4>
                            <span>Subscribe our newsletter to get our latest update & news.</span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="it-newsletter-right p-relative text-end">
                            <form action="{{ route('newsletter') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Enter your email:">
                                <button class="it-btn black-bg" type=submit><span>subscribe now</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
