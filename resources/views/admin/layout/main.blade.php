<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Admin Panel - @yield('title')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/daterangepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/app-light.css') }}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('css/admin/app-light.css') }}" id="darkTheme">
</head>

<body class="vertical  dark  ">
    <div class="wrapper">
        <x-admin.admin-nav />


        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h5 page-title">@yield('title')</h2>
                            </div>
                            <div class="col-auto">
                                @yield('actions')

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <div class="card shadow">
                                    <div class="card-body">

                                        @yield('content')

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->
        </main> <!-- main -->
    </div> <!-- .wrapper -->




    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/moment.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/admin/simplebar.min.js') }}"></script>
    <script src='{{ asset('js/admin/daterangepicker.js') }}'></script>
    <script src='{{ asset('js/admin/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('js/admin/tinycolor-min.js') }}"></script>
    <script src="{{ asset('js/admin/config.js') }}"></script>
    <script src="{{ asset('js/admin/d3.min.js') }}"></script>
    <script src="{{ asset('js/admin/topojson.min.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('js/admin/datamaps.custom.js') }}"></script>
    <script src="{{ asset('js/admin/Chart.min.js') }}"></script>
    <script>
        /* defind global options */
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('js/admin/gauge.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/admin/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/admin/apexcharts.custom.js') }}"></script>
    <script src='{{ asset('js/admin/jquery.mask.min.js') }}'></script>
    <script src='{{ asset('js/admin/select2.min.js') }}'></script>
    <script src='{{ asset('js/admin/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('js/admin/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('js/admin/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('js/admin/dropzone.min.js') }}'></script>
    <script src='{{ asset('js/admin/uppy.min.js') }}'></script>
    <script src='{{ asset('js/admin/quill.min.js') }}'></script>


    <script src="{{ asset('js/admin/apps.js') }}"></script>



    @if (session()->has('success'))
        <div class="toast-container position-fixed " style="z-index: 11;right:1rem; bottom:1rem;">
            <div class="toast fade  align-items-center text-white bg-success border-0" role="alert"
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
        <div class="toast-container position-fixed " style="z-index: 11;right:1rem; bottom:1rem;">
            <div class="toast fade  align-items-center text-white bg-danger border-0" role="alert"
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
    @if ($errors->any() || session('error'))
        <div class="toast-container position-fixed" style="z-index: 11; right:1rem; bottom:1rem;">
            <div class="toast fade show align-items-center text-white bg-danger border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ $errors->any() ? $errors->first() : session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastEl = document.querySelector('.toast');
            if (toastEl) {
                var option = {
                    autohide: true,
                    delay: 5000 // 5 seconds
                };
                var toast = new bootstrap.Toast(toastEl, option);
                toast.show();
            }
        });
    </script>

    {{-- <script src="https://cdn.ckeditor.com/4.17.0/standard/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('#description').forEach(function(el) {
                CKEDITOR.replace(el);
            });
        });
    </script>

</body>

</html>
