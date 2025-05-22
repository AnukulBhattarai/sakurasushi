<!doctype html>
<html class=no-js lang=zxx>
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset=utf-8>
    <meta http-equiv=x-ua-compatible content="ie=edge">
    <title>Sakura</title>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logo.png') }}">
    <link rel=stylesheet href="{{ asset('css/bootstrap.min.css') }}">
    <link rel=stylesheet href="{{ asset('css/animate.css') }}">
    <link rel=stylesheet href="{{ asset('css/custom-animation.css') }}">
    <link rel=stylesheet href="{{ asset('css/slick.css') }}">
    <link rel=stylesheet href="{{ asset('css/nice-select.css') }}">
    <link rel=stylesheet href="{{ asset('css/flaticon_xoft.css') }}">
    <link rel=stylesheet href="{{ asset('css/swiper-bundle.css') }}">
    <link rel=stylesheet href="{{ asset('css/meanmenu.css') }}">
    <link rel=stylesheet href="{{ asset('css/font-awesome-pro.css') }}">
    <link rel=stylesheet href="{{ asset('css/magnific-popup.css') }}">
    <link rel=stylesheet href="{{ asset('css/spacing.css') }}">
    <link rel=stylesheet href="{{ asset('css/main.css') }}">
</head>

<body>
    <button class="scroll-top scroll-to-target" data-target=html>
        <i class="far fa-angle-double-up"></i>
    </button>

    @include('layouts.header')

    @yield('body')

    @include('layouts.footer')

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ $organization->phone }}" class="whatsapp-button" target="_blank"
        aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #25d366;
            color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .whatsapp-button:hover {
            background-color: #1ebea5;
        }
    </style>

    <!-- Font Awesome CDN -->


    @if (session()->has('success'))
        <div class="toast-container position-fixed" style="z-index: 11; right: 1rem; bottom: 1rem;">
            <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="toast-container position-fixed" style="z-index: 11; right: 1rem; bottom: 1rem;">
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $errors->first() }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize and show the success toast if it exists
            var successToastEl = document.getElementById('successToast');
            if (successToastEl) {
                var successToast = new bootstrap.Toast(successToastEl);
                successToast.show();
            }

            // Initialize and show the error toast if it exists
            var errorToastEl = document.getElementById('errorToast');
            if (errorToastEl) {
                var errorToast = new bootstrap.Toast(errorToastEl);
                errorToast.show();
            }
        });
    </script>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/waypoints.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup.js') }}"></script>
    <script src="{{ asset('js/purecounter.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/nice-select.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('js/ajax-form.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
