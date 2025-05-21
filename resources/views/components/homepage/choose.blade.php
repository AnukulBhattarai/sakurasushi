@props(['choose'])
<div class="it-choose-area p-relative pt-180 pb-100">
    <div class="it-choose-shape-4 d-none d-md-block">
        <img src="{{ asset('img/choose/shape-1-4.png') }}" alt="">
    </div>
    <div class=container>
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class=it-choose-left>
                    <div class="it-choose-title-box mb-30">
                        <span class=it-section-subtitle>{{ $choose->title }}</span>
                        <h4 class=it-section-title>{{ $choose->display_name }}
                        </h4>
                    </div>
                    <div class="it-choose-text pb-15">
                        {!! $choose->description !!}
                    </div>
                    <div class=it-choose-content-box>
                        <div class="row gx-20">
                            @foreach ($choose->sections as $section)
                                <div class="col-md-6 col-sm-6 mb-20">
                                    <div class="it-choose-content " style="height: 155px; overflow: hidden;">
                                        <h5><i class="fa-solid fa-circle-check"></i>{{ $section['title'] }}</h5>
                                        <p>{{ $section['description'] }} </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="it-choose-thumb-box text-center text-md-end">
                    <div class="it-choose-thumb p-relative">
                        <div style="max-height: 500px; overflow: hidden;">
                            @isset($choose->extra['thumbnail'])
                                <img src="{{ asset('storage/' . $choose->extra['thumbnail']) }}"
                                    style="height: 100%; width:100%; object-fit:cover;" alt="">
                            @endisset
                        </div>
                        <div class=it-choose-shape-1>
                            <img src="{{ asset('img/choose/shape-1-1.png') }}" alt="">
                        </div>
                        <div class=it-choose-shape-2>
                            <img src="{{ asset('img/choose/shape-1-2.png') }}" alt="">
                        </div>
                        <div class="it-choose-shape-3 d-none d-lg-block">
                            <img src="{{ asset('img/choose/shape-1-3.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
