@props(['value'])
<section class="feature-value-section fix section-bg-2"
    style="padding-top: 100px; padding-bottom: 92px; margin-bottom: 0;">
    <div class="shape-1">
        <img src="{{ asset('img/value/shape-1.png') }}" style="height: 190px" alt="shape-img">
    </div>
    <div class="shape-2 float-bob-x">
        <img src="{{ asset('img/value/shape-2.png') }}" alt="shape-img">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <span class="wow fadeInUp">Our values</span>
            <h2 class="wow fadeInUp" data-wow-delay=".3s">{{ $value->display_name }}</h2>
        </div>
        @isset($value->sections)
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="feature-value-items">
                        @if ($value->sections[0])
                            <div class="value-icon-items wow fadeInUp" data-wow-delay=".3s">
                                <div class="icon">
                                    <i class="icon-icon-2"></i>
                                </div>
                                <div class="content">
                                    <h5> {{ $value->sections[0]['title'] }}
                                    </h5>
                                    <p>
                                        {{ $value->sections[0]['description'] }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($value->sections[1])
                            <div class="value-icon-items wow fadeInUp" data-wow-delay=".5s">
                                <div class="icon color-2">
                                    <i class="icon-icon-15"></i>
                                </div>
                                <div class="content">
                                    <h5>{{ $value->sections[1]['title'] }}</h5>
                                    <p>{{ $value->sections[1]['description'] }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($value->sections[2])
                            <div class="value-icon-items wow fadeInUp" data-wow-delay=".5s">
                                <div class="icon color-2">
                                    <i class="icon-icon-13"></i>
                                </div>
                                <div class="content">
                                    <h5>{{ $value->sections[2]['title'] }}</h5>
                                    <p>{{ $value->sections[2]['description'] }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="feature-value-items">
                        <div class="feature-value-image">
                            <img src="{{ asset('storage/' . $value->extra['thumbnail']) }}"
                                style="height: 100%; width:100%; object-fit:cover;" alt="img">
                            <div class="value-shape">
                                <img src="{{ asset('img/cta/cta-shape-2.png') }}" alt="shape-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="feature-value-items">
                        @if ($value->sections[3])
                            <div class="value-icon-items style-2 wow fadeInUp" data-wow-delay=".3s">
                                <div class="content">
                                    <h5>{{ $value->sections[3]['title'] }}</h5>
                                    <p>{{ $value->sections[3]['description'] }}</p>
                                </div>
                                <div class="icon color-3">
                                    <i class="icon-icon-16"></i>
                                </div>
                            </div>
                        @endif
                        @if ($value->sections[4])
                            <div class="value-icon-items style-2 wow fadeInUp" data-wow-delay=".5s">
                                <div class="content">
                                    <h5>{{ $value->sections[4]['title'] }}</h5>
                                    <p>{{ $value->sections[4]['description'] }}</p>
                                </div>
                                <div class="icon color-2 color-4">
                                    <i class="icon-icon-8"></i>
                                </div>
                            </div>
                        @endif
                        @if ($value->sections[5])
                            <div class="value-icon-items style-2 wow fadeInUp" data-wow-delay=".5s">
                                <div class="content">
                                    <h5>{{ $value->sections[5]['title'] }}</h5>
                                    <p>{{ $value->sections[5]['description'] }}</p>
                                </div>
                                <div class="icon color-2 color-4">
                                    <i class="icon-icon-2"></i>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endisset
    </div>
</section>
