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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logo.jpg') }}">
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
