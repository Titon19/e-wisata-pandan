<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title ?? env('APP_NAME') }}</title>
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}img/logo-hai2.png">


    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/flaticon.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/gijgo.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/animate.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/slick.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/slicknav.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/style.css">
    <link rel="stylesheet" href="{{ asset('admin_theme') }}/assets/css/plugins/lightbox.min.css">

    @stack('css')

</head>

<body>
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('welcome') }}">
                                        <img src="{{ asset('/') }}img/logo-karacak-2.png" alt="{{ env('APP_NAME') }}" width="200">
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <script src="{{ asset('/') }}js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="{{ asset('/') }}js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('/') }}js/popper.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/owl.carousel.min.js"></script>
    <script src="{{ asset('/') }}js/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}js/ajax-form.js"></script>
    <script src="{{ asset('/') }}js/waypoints.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.counterup.min.js"></script>
    <script src="{{ asset('/') }}js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/') }}js/scrollIt.js"></script>
    <script src="{{ asset('/') }}js/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('/') }}js/wow.min.js"></script>
    <script src="{{ asset('/') }}js/nice-select.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.slicknav.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/') }}js/plugins.js"></script>
    <script src="{{ asset('/') }}js/gijgo.min.js"></script>
    <script src="{{ asset('/') }}js/slick.min.js"></script>
    <script src="{{ asset('admin_theme') }}/assets/js/plugins/lightbox.min.js""></script>

    <script src=" {{ asset('/') }}js/contact.js"></script>
    <script src="{{ asset('/') }}js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('/') }}js/jquery.form.js"></script>
    <script src="{{ asset('/') }}js/jquery.validate.min.js"></script>
    <script src="{{ asset('/') }}js/mail-script.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>

    @stack('js')
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
    </script>

</body>

</html>