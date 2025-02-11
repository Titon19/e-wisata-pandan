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

    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "2b8b5a28-d8a5-4f3c-b16f-f62e6eef1493";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>

</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="{{ route('welcome') }}">
                                        <img src="{{ asset('/') }}img/logo-hai2.png" alt="{{ env('APP_NAME') }}" width="200">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="{{ url('/') }}">Home</a></li>
                                            <li><a class="active" href="{{ url('/tentang') }}">About</a></li>
                                            <li><a class="active" href="{{ route('fasilitas_list') }}">Fasilitas</a></li>
                                            <li><a class="active" href="{{ route('promo_list') }}">Promo</a></li>
                                            {{-- <li><a href="#">Kategori <i class="ti-angle-down"></i></a>
                                                @php
                                                    $menu_kategori = \App\Kategori::all();
                                                @endphp
                                                <ul class="submenu">
                                                    @foreach ($menu_kategori as $item)
                                                        <li><a href="{{ route('wisata.list_by_kategori', $item->id) }}">{{ $item->category }}</a></li>
                                            @endforeach
                                        </ul>
                                        </li> --}}
                                        {{-- <li><a class="" href="{{ route('wisata_list') }}">Wisata</a></li> --}}
                                        <li><a class="" href="{{ route('berita_list') }}">Blog</a></li>
                                        <li><a class="" href="{{ route('gallery_list') }}">Gallery</a></li>
                                        <li><a href="#">Informasi <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('kontak') }}"> Contact Us </a></li>
                                                <li><a href="https://maps.app.goo.gl/XQBB4KDxF5UKhtKw5"> Maps </a></li>
                                            </ul>
                                        </li>
                                        {{-- <li><a class="" href="{{ route('berita_list') }}">Maps</a></li> --}}
                                        {{-- @if (Auth::check() && Auth::user()->role == 'member')
                                                <li><a href="{{ url('dashboard') }}">
                                        <img src="{{ Auth::user()->avatar == '' ? asset('img/user.png') : url(Storage::url(Auth::user()->avatar)) }}" alt="" style="max-width: 20px;border-radius:50%;">
                                        My Dashboard
                                        </a></li>
                                        @else
                                        <li><a href="{{ url('login') }}">Login</a></li>
                                        @endif --}}
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="social_links d-none d-xl-block">
                                        <ul style="display: flex; list-style-type: none; padding: 0;">
                                            <li style="margin-right: 30px;"><a href="{{ url('register') }}">Register</a></li>
                                            @if (Auth::check() && Auth::user()->role == 'member')
                                            <li><a href="{{ url('dashboard') }}">
                                                    <img src="{{ Auth::user()->avatar == '' ? asset('img/user.png') : url(Storage::url(Auth::user()->avatar)) }}" alt="" style="max-width: 20px;border-radius:50%;">
                                                    My Dashboard
                                                </a></li>
                                            @else
                                            <li style="margin-right: 30px;"><a href="{{ url('login') }}">Login</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="seach_icon">
                                <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div> --}}
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

    <div class="testimonial_area">
        @php
        // get testimoni
        $testimoni = \App\Transaction::where('status', 1)
        ->where('testimoni', '!=', '')
        ->orderBy('id', 'desc')
        ->with(['member'])
        ->get();
        @endphp
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        @foreach ($testimoni as $item)
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <div class="author_thumb">
                                            <img src="{{ $item->member->avatar != '' ? url(Storage::url($item->member->avatar)) : asset('img/user.png') }}" alt="" style="width:100px;border-radius: 50%;">
                                        </div>
                                        <p>"{{ $item->testimoni }}".</p>
                                        <div class="testmonial_author">
                                            <h3>- {{ $item->member->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                {{-- <a href="#">
                                    <img src="{{ asset('/') }}img/e-wisata.png" alt="E-Wisata" width="200">
                                </a> --}}
                                <h2 style="color: aliceblue">WISATA PANTAI PANDAN CARITA KABUPATEN PANDEGLANG</h2>
                            </div>
                            <p>Sistem Informasi Pemesanan Tiket <br>Wisata Pantai Pandan. <br><br>
                             Call : +62 878 6611 01171<br>
                             Email : pantaipandai@gmail.com <br><br>
                             Sosial Media :
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/pandanbeachcarita?mibextid=rS40aB7S9Ucbxw6v" target="_blank">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                            
                                    <li>
                                        <a href="https://www.instagram.com/pantai_pandan?igsh=MXJjNTRxeTU4d21yNA==" target="_blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <ul class="links">
                                <li><a href="{{ route('welcome') }}">Home</a></li>
                                <li><a href="{{ url('/tentang') }}">About</a></li>
                                <li><a href="{{ url('/berita') }}">Blog</a></li>
                                <li><a href="{{ route('fasilitas_list') }}"> Fasilitas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <ul class="links">
                                <li><a href="{{ url('/promo') }}">Promo</a></li>
                                <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                                <li><a href="{{ url('/kontak') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">

                            Copyright &copy; 2023 Pantai Pandan

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="serch_form" method="POST" action="{{ route('wisata_list.search') }}">
                    @csrf
                    <input type="text" placeholder="Search" name="keyword">
                    <button type="submit">search</button>
                </form>
            </div>
        </div>
    </div>



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