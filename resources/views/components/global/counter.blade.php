@props(['counter'])
<section class="counter-section fix">
    <div class="line-shape">
        <img src="{{ asset('img/counter/line-shape.png') }}" alt="shape-img">
    </div>
    <div class="box-shape float-bob-x">
        <img src="{{ asset('img/counter/box-shape.png') }}" alt="shape-img">
    </div>
    <div class="counter-bg"></div>
    <div class="container">
        <div class="counter-wrapper">
            <div class="row g-4">
                @foreach ($counter->sections as $index => $section)
                    @if ($index < 4)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                            <div class="counter-items">
                                <div class="content">
                                    <h2><span class="count">{{ $section['description'] }}</span>+</h2>
                                    <p>{{ $section['title'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>
