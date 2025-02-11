@extends('layouts.front')

@push('css')
<style>
    #gmap {
        height: 100%;
    }

    .popupContent {
        width: 400px;
    }
</style>
@endpush

@section('content')
<div class="slider_area">
    <div class="slider_active owl-carousel">
        <div class="single_slider  d-flex align-items-center overlay" style="background-image: url('{{ asset('img/selider10.jpg') }}')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="text-center">
                            <h3 style="color: white; font-weight: bold; font-size: 50px;">SELAMAT DATANG DI WEBSITE WISATA <br> PANTAI PANDAN CARITA</h3>
                            <p style="color: white; font-weight: bold;">Aplikasi Berbasis Website Untuk Pemesanan Tiket Wisata Online</p>
                            {{-- <p>{{ env('APP_NAME') }}</p> --}}
                            <br><br>
                            <a href="register" class="boxed-btn4">Pesan Sekarang !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider  d-flex align-items-center overlay" style="background-image: url('{{ asset('img/selider9.jpg') }}')">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="text-center">
                            <h3 style="color: white; font-weight: bold; font-size: 50px;">WISATA PANTAI KABUPATEN PANDEGLANG</h3>
                            <p style="color: white; font-weight: bold;">Kabupaten Pandeglang merupakan sebuah kabupaten yang terletak
                                di provinsi Jawa Barat, Indonesia. Kabupaten ini memiliki keindahan pantai yang menarik dan beragam
                                destinasi wisata yang patut dikunjungi, salah satunya yaitu wisata pantai pandan.</p>
                            {{-- <p>{{ env('APP_NAME') }}</p> --}}
                            <br><br>
                            <a href="fasilitas" class="boxed-btn4">Jelajahi Sekarang ...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

{{-- <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>Mau Berwisata Kemana?</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="{{ route('wisata_list.search') }}" method="POST" style="justify-content: flex-end">
@csrf
<div class="input_field" style="margin-right: 20px !important;">
    <input type="text" placeholder="Mau Kemana?" name="keyword">
</div>
<div class="input_field" style="margin-right: 20px !important;">
    <input id="datepicker" placeholder="Tanggal">
</div>
<div class="search_btn">
    <button class="boxed-btn4 " type="submit">Cari</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div> --}}


<div class="popular_places_area">
    <div class="container">
        <div class="row center-content-center">
            {{-- <div class="col-lg-12">
                   <div style="height: 500px;">
                        <div id="gmap"></div>
                    </div>
                </div> --}}
        </div>


        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3><b>SELAMAT DATANG DI WISATA PANTAI PANDAN CARITA</b></h3>
                    <p class="justify">Pantai Pandan Carita menjadi tempat wisata untuk berlibur bersama teman maupun keluarga yang berlokasi di carita Kabupaten Pandeglang.  Dimana wisata ini bermula karnena memanfaatkan sebuah bangunan penginapan yang telah rusak akibat tsunami dari letusan gunung krakatau tahun 2018 silam dan diubah dan dipercantik dengan nuansa bali sehingga pantai ini memiliki konsep arsitektur bernuansa bali yang menjadi daya tarik tersendiri bagi wisatawan. Nuansa khas bali yang ada di Pantai Pandan menjadikan pantai ini berbeda dengan pantai-pantai yang ada di sekitarnya. Di pantai Pandan para wisatawan dapat menikmati fasilitas café, swimming pool dan berbagai atraksi lainnya seperti snorkling, surfing, dan camping.</p>
                    <br><br>
                    <a href="tentang" class="boxed-btn4">Tentang Kami ...</a>
                    {{-- <p>Nah, buat kamu yang bingung akhir pekan mau ke mana, Berikut ini ada beberapa tempat wisata di
                            {{ env('APP_NAME') }} terbaru yang lagi hits dan wajib untuk kamu kunjungi!.</p> --}}
                </div>
            </div>
        </div>

        <div class="video_area video_bg overlay">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video_wrap text-center">
                            {{-- <h3>Pariwisata {{ env('APP_NAME') }}</h3> --}}
                            <h3 style="color: white; font-weight: bold; font-size: 50px;">VIDEO WISATA <br> PANTAI PANDAN</h3>
                            <div class="video_icon">
                                {{-- <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=ckxhoqgFJZc"> --}}
                                <a class="popup-video video_play_button" href="https://www.youtube.com/watch?v=3FgmD7jH2PU">
                                    <i class="fa fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="section_title text-center mb_70">
                    <h3><b>FASILITAS DI WISATA PANTAI PANDAN</b></h3>
                    <p>Anda bisa menggunakan beragam fasilitas yang
                        tersedia di Wisata Pantai Pandan.
                    </p>
                    <hr>
                </div>
            </div>
        </div>

        {{-- <div class="row">
                @foreach ($wisatas as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single_place">
                            <div class="thumb">
                                <img src="{{ ($item->thumbnail == '') ? asset('img/default.png') : url(Storage::url($item->thumbnail)) }}" alt="">
        <a href="{{ route('wisata.detail', $item->slug) }}" class="prise">Rp {{ number_format($item->price, 0, ",", ".") }}</a>
    </div>
    <div class="place_info">
        <a href="{{ route('wisata.detail', $item->slug) }}">
            <h3>{{ $item->wisata }}</h3>
        </a>
        <p>{!! Str::limit($item->desc, 50) !!}</p>
        <div class="rating_days d-flex justify-content-between">
            <span class="d-flex justify-content-center align-items-center">
                @php
                // Akumulasi star score dari setiap review
                $transactions = $item->transaksi->where('testimoni', '!=', '')->where('status', 1);
                $scores = 0;
                foreach($transactions as $trans) {
                $scores += $trans->star_score;
                }
                $accumulated = round((($scores == 0) ? 1 : $scores) / (($transactions->count() == 0) ? 1 : $transactions->count()));
                @endphp

                @for ($i = 0; $i < $accumulated; $i++) <i class="fa fa-star"></i>
                    @endfor
                    <a href="#">({{ $transactions->count() }} Review)</a>
            </span>
        </div>
    </div>
</div>
</div>
@endforeach
</div> --}}
<div class="row">
    @foreach ($fasilitasWisata as $item)
    <div class="col-lg-4 col-md-6">
        <div class="single_place">
            <div class="thumb">
                <img src="{{ ($item->thumbnail == '') ? asset('img/default.png') : url(Storage::url($item->thumbnail)) }}" alt="">
                {{-- <a href="{{ route('wisata.detail', $item->slug) }}" class="prise">Rp {{ number_format($item->price, 0, ",", ".") }}</a> --}}
            </div>
            <div class="place_info">
                <a href="{{ route('fasilitas.detail', $item->slug) }}">
                    <h3>{{ $item->judul }}</h3>
                </a>
                <p>{!! Str::limit($item->deskripsi, 50) !!}</p>
                {{-- <div class="rating_days d-flex justify-content-between">
                                    <span class="d-flex justify-content-center align-items-center">
                                        @php
                                        // Akumulasi star score dari setiap review
                                        $transactions = $item->transaksi->where('testimoni', '!=', '')->where('status', 1);
                                        $scores = 0;
                                        foreach($transactions as $trans) {
                                            $scores += $trans->star_score;
                                        }
                                        $accumulated = round((($scores == 0) ? 1 : $scores) / (($transactions->count() == 0) ? 1 : $transactions->count()));
                                        @endphp

                                        @for ($i = 0; $i < $accumulated; $i++)
                                            <i class="fa fa-star"></i>
                                        @endfor
                                        <a href="#">({{ $transactions->count() }} Review)</a>
                </span>
            </div> --}}
        </div>
    </div>
</div>
@endforeach
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="more_place_btn text-center">
            <a class="boxed-btn4" href="{{ route('fasilitas_list') }}">Lihat Fasilitas Selengkapnya...</a>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="section_title text-center mb_70">
            <h3><b>PROMO TERBARU</b></h3>
            <p>Nikmati juga promo-promo menarik dari Wisata Pantai Pandan</p>
            <hr>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($promo as $item)
    <div class="col-lg-4 col-md-6">
        <div class="single_place">
            <div class="thumb">
                <img src="{{ ($item->thumbnail == '') ? asset('img/default.png') : url(Storage::url($item->thumbnail)) }}" alt="">
            </div>
            <div class="place_info">
                <a href="{{ route('promo.detail', $item->slug) }}">
                    <h3>{{ $item->judul }}</h3>
                </a>
                <p>{!! Str::limit($item->deskripsi, 50) !!}</p>
                <p>{{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="more_place_btn text-center">
            <a class="boxed-btn4" href="{{ route('promo_list') }}">Lihat Promo Selengkapnya...</a>
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="section_title text-center mb_70">
            <br><br>
            <h3><b>Alamat & Jam Operasional <br> Wisata Pantai Pandan </b></h3>
            <p>Pantai Pandan berada  di JL. Raya Carita No.29, Sukajadi, Kecamatan Carita, Kabupaten Pandeglang, Banten.<br>
                Jam operasional Pantai Pandan : Setiap Hari Senin-Minggu, mulai pukul 10:00 s/d 22:00 WIB
            </p>
            {{-- <p>Nah, buat kamu yang bingung akhir pekan mau ke mana, Berikut ini ada beberapa tempat wisata di
                            {{ env('APP_NAME') }} terbaru yang lagi hits dan wajib untuk kamu kunjungi!.</p> --}}
        </div>
    </div>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="section_title text-center mb_70">
            <h3><b>GALLERY</b></h3>
            <p>Berbagai Gambar-Gambar terkait wisata Pantai Pandan</p>
            <hr>
        </div>
    </div>
</div>

<div class="row">
    @foreach ($galleries as $item)
    <div class="col-lg-4 col-md-6">
        <div class="single_place">
            <a href="{{ ($item->thumbnail == '') ? asset('img/default.png') : url(Storage::url($item->thumbnail)) }}" data-lightbox="gallery" data-title="{{ $item->judul }}">
                <div class="thumb">
                    <img src="{{ ($item->thumbnail == '') ? asset('img/default.png') : url(Storage::url($item->thumbnail)) }}" alt="">
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>
</div>
</div>
</div>
</div>



<br>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6">
        <div class="section_title text-center mb_70">
            <h3><b>Booking Tiket Wisata <br> Pantai Pandan Sekarang Juga!</b></h3>
            <p>Dengan Daftar Menjadi Member.</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="more_place_btn text-center">
            <a class="boxed-btn4" href="{{ route('register') }}">Beli Tiket Sekarang!<br></a>
            <br><br>
        </div>
    </div>
</div>

{{-- <div class="travel_variation_area">
        <div class="container">
            <div class="row">
                @foreach ($fasilitas as $item)
                    <div class="col-lg-4 col-md-6 mb-2">
                        <div class="single_travel text-center">
                            <div class="icon">
                                <img src="{{ ($item->thumbnail == '') ? asset('img/default.jpg') : url(Storage::url($item->thumbnail)) }}" alt="" style="max-width: 80px;">
</div>
<h4>{{ $item->facility }}</h4>
</div>
</div>
@endforeach
</div>
</div>
</div> --}}
@endsection

@push('js')

<script src="https://maps.googleapis.com/maps/api/js?&key={{ env('GMAP_API_KEY') }}">
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<!-- Marker Clusterer Lib -->

<script>
    var gmarkers1 = [];
    var markers1 = [];
    var infowindow = new google.maps.InfoWindow({
        content: ''
    });
    /**
     * Function to init map
     */
    function initialize() {
        var center = new google.maps.LatLng(-6.981818622450134, 108.49000703727529);
        var mapOptions = {
            zoom: 8,
            center: center,
            zoomControl: true,
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        map = new google.maps.Map(document.getElementById('gmap'), mapOptions);
        $.ajax({
            url: "{{ route('v1.tracking.get_all_wisata_front') }}",
            dataType: 'json',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                markers1 = response.map(el => {
                    return {
                        "id": el['id'],
                        "link_detail": el['link_detail'],
                        "price": el['price'],
                        "wisata": el['wisata'],
                        "image": el['image'],
                        "pin_image": el['pin_image'],
                        "lat": parseFloat(el['latitude']),
                        "lng": parseFloat(el['longitude']),
                        "facilities": el['facilities'],
                    }
                });
                for (i = 0; i < markers1.length; i++) {
                    addMarker(markers1[i]);
                }
            }
        })
    }
    /**
     * Function to add marker to map
     */
    function addMarker(marker) {
        var title = marker["wisata"];
        var pos = new google.maps.LatLng(marker["lat"], marker["lng"]);
        var content = `
            <div class="popupContent">
                <div style="font-size:16px;font-weight:bold;">${marker.wisata}</div>
                <img src="${marker.image}" style="width:200px;">
                <p class="my-2" style="margin-bottom:2px;font-size:14px !important;">Harga: <b>Rp ${marker.price}</b> / Orang</p>
                <p style="margin-bottom:2px;">Fasilitas: <span style="font-size:10px;">${marker.facilities}</span></p>
                <a href="https://maps.google.com/?saddr=My+Location&daddr=${marker.lat},${marker.lng}" target="_blank" class="btn btn-sm btn-primary">Direction by GMap</a>
                <a href="${marker.link_detail}" target="_blank" class="btn btn-sm btn-info">Detail</a>
            </div>
        `;
        var theIcon = `${marker.pin_image}`;
        var icon = {
            url: theIcon,
            scaledSize: new google.maps.Size(20, 20)
        };
        marker1 = new google.maps.Marker({
            title: title,
            position: pos,
            map: map,
            icon: icon
        });
        gmarkers1.push(marker1);
        // Marker click listener
        google.maps.event.addListener(marker1, 'click', (function(marker1, content) {
            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker1);
                map.panTo(this.getPosition());
            }
        })(marker1, content));
    }
    filterMarkers = function(category) {
        for (i = 0; i < gmarkers1.length; i++) {
            marker = gmarkers1[i];
            // If is same category or category not picked
            if (marker.category == category || category.length === 0) {
                //Close InfoWindows
                marker.setVisible(true);
                if (infowindow) {
                    infowindow.close();
                }
            }
            // Categories don't match
            else {
                marker.setVisible(false);
            }
        }
    }
    // Init map
    initialize();
</script>

<script>
    // Inisialisasi Lightbox
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true
    });
</script>
@endpush