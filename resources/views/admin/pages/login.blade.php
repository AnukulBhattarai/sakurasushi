<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="favicon.ico"> --}}
    <title>Login</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/feather.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('css/admin/app-light.css') }}" id="darkTheme">
</head>

<body class="dark ">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST"
                action="{{ route('authenticate') }}">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('home') }}"
                    style="margin-bottom: 20px;">
                    @isset($organization->logo)
                        <img src="{{ asset('storage/' . $organization->logo) }}" style="height: 80px" alt="Logo">
                    @else
                        <img src="{{ asset('img/logo.png') }}" alt="Logo">
                    @endisset
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control form-control-lg"
                        placeholder="Email address" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control form-control-lg"
                        placeholder="Password" required="">
                </div>
                @if ($errors->any())
                    <div id="defaultFormControlHelp" class="form-text text-danger">
                        {{ $errors->first() }}
                    </div>
                @endif
                {{-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in </label>
                </div> --}}
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">© 2024</p>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/admin/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('js/admin/tinycolor-min.js') }}"></script>
    <script src="{{ asset('js/admin/config.js') }}"></script>
    <script src="{{ asset('js/admin/apps.js') }}"></script>
    <!-- Global site tag (gtag.js')}}) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>
</body>

</html>
