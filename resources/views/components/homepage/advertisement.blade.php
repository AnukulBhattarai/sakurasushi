<div class="it-video-area it-video-bg p-relative fix pt-100 pb-95" data-background="{{ asset('img/video/banner.jpg') }}">
    <div class="it-video-shape-1 d-none d-lg-block">
        <img src="{{ asset('img/video/shape-1-1.png') }}" alt="" />
    </div>
    <div class="it-video-shape-2 d-none d-lg-block">
        <img src="{{ asset('img/video/shape-1-2.png') }}" alt="" />
    </div>
    <div class="it-video-shape-3 d-none d-lg-block">
        <img src="{{ asset('img/video/shape-1-3.png') }}" alt="" />
    </div>
    <div class="it-video-shape-4 d-none d-lg-block">
        <img src="{{ asset('img/video/shape-1-4.png') }}" alt="" />
    </div>
    <div class="it-video-shape-5 d-none d-lg-block">
        <img src="{{ asset('img/video/shape-1-5.png') }}" alt="" />
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                <div class="it-video-content">
                    <span>Join Our New Session</span>
                    <h3 class="it-video-title">
                        Call To Enroll Your Child <br />
                        <a href="tel:+977{{ $organization->phone }}">(+977){{ $organization->phone }}</a>
                    </h3>
                    <div class="it-video-button">
                        <a class="it-btn" href="{{ route('contact') }}">
                            <span>
                                Join With us
                                <svg width="17" height="14" viewBox="0 0 17 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 1.24023L16 7.24023L11 13.2402" stroke="currentcolor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 7.24023H16" stroke="currentcolor" stroke-width="1.5"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-3 col-sm-3">
                <div class="it-video-play-wrap d-flex justify-content-start justify-content-md-end align-items-center">
                    <div class="it-video-play text-center">
                        <a class="popup-video play" href="https://www.youtube.com/watch?v=PO_fBTkoznc"><i
                                class="fas fa-play"></i></a>
                        <a class="text" href="#">watch now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
