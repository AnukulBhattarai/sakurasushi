@props(['about'])
<div class="it-about-area p-relative pt-185 pb-185">
    <div class="it-about-shape-4 d-none d-md-block">
        <img src="{{ asset('img/about/shape-1-4.png') }}" alt="">
    </div>
    <div class=container>
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="it-about-thumb-box p-relative">
                    <div style="height:500px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $about->side_image) }}"
                            style="height: 100%; width:100%; object-fit:cover;" alt="">
                    </div>
                    <div class="it-about-shape-1 d-none d-md-block">
                        <img src="{{ asset('img/about/shape-1-1.png') }}" alt="">
                    </div>
                    <div class="it-about-shape-2 d-none d-md-block">
                        <img src="{{ asset('img/about/shape-1-2.png') }}" alt="">
                    </div>
                    <div class="it-about-shape-3 d-none d-md-block">
                        <img src="{{ asset('img/about/shape-1-3.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class=it-about-right-box>
                    <div class="it-about-title-box mb-20">
                        <span class=it-section-subtitle>{{ $about->title }}</span>
                        <h4 class=it-section-title>{{ $about->sub_title }}
                        </h4>
                    </div>
                    <div class="it-about-text pb-10">
                        {!! $about->description !!}
                    </div>
                    <a class=it-btn href="{{ route('about') }}">
                        <span>
                            More About Us
                            <svg width=17 height=14 viewBox="0 0 17 14" fill=none xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1.24023L16 7.24023L11 13.2402" stroke=currentcolor stroke-width=1.5
                                    stroke-miterlimit=10 stroke-linecap=round stroke-linejoin=round />
                                <path d="M1 7.24023H16" stroke=currentcolor stroke-width=1.5 stroke-miterlimit=10
                                    stroke-linecap=round stroke-linejoin=round />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
