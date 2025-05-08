<!-- Main Cta Section Start -->
<section class="main-cta-section">
    <div class="main-cta-wrapper section-padding py-4">
        <div class="pencil-shape">
            <img src="{{ asset('img/cta/pencil-2.png') }}" alt="img">
        </div>
        <div class="plane-shape float-bob-y">
            <img src="{{ asset('img/cta/plane.png') }}" alt="img">
        </div>
        <div class="cta-shape float-bob-x">
            <img src="{{ asset('img/cta/shape.png') }}" alt="img">
        </div>
        <div class="cta-bg"></div>
        <div class="section-title text-center">
            <span class="text-white wow fadeInUp">Newsletter</span>
            <h2 class="text-white wow fadeInUp" data-wow-delay=".3s">Subscribe to our newsletter <br> and stay updated
            </h2>
        </div>
        <form action="{{ route('newsletter') }}" method="post">
            @csrf
            <div class="newsletter-items">
                <div class="form-clt wow fadeInUp" data-wow-delay=".5s">
                    <input type="text" name="email" id="email" placeholder="Email Address">
                </div>
                <button class="theme-btn wow fadeInUp" data-wow-delay=".7s" type="submit">
                    <span>Subscribe Now</span>
                </button>
            </div>
        </form>
    </div>
</section>
