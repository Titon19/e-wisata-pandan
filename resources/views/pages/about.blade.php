@extends('layouts.front')

@section('content')
<div class="bradcam_area" style="background-image: url('{{ asset('img/selider5.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center">
                    <h3>TENTANG KAMI <br> WISATA PANTAI PANDAN</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about_story">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="story_heading">
                </div>
                <div class="row">
                    <div class="col-lg-11 offset-lg-1">
                        <div class="story_info">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h1><b>PANTAI PANDAN</b></h1><br><br>
                                    <p class="justify">Aplikasi Berbasis website yang menyediakan informasi wisata sekaligus tersedia fitur
                                        pemesanan sehingga memudahkan wisatawan dalam pembelian tiket online. <br><br>

                                        "Pantai Pandan Carita menjadi tempat wisata untuk berlibur bersama teman maupun keluarga yang berlokasi di carita Kabupaten Pandeglang. Dimana wisata ini bermula karnena memanfaatkan sebuah bangunan penginapan yang telah rusak akibat tsunami dari letusan gunung krakatau tahun 2018 silam dan diubah dan dipercantik dengan nuansa bali sehingga pantai ini memiliki konsep arsitektur bernuansa bali yang menjadi daya tarik tersendiri bagi wisatawan. Nuansa khas bali yang ada di Pantai Pandan menjadikan pantai ini berbeda dengan pantai-pantai yang ada di sekitarnya. Di pantai Pandan para wisatawan dapat menikmati fasilitas café, swimming pool dan berbagai atraksi lainnya seperti snorkling, surfing, dan camping."<br><br>

                                        Pantai Pandan berada di JL. Raya Carita No.29, Sukajadi, Kecamatan Carita, Kabupaten Pandeglang, Banten.<br><br> Jam operasional Pantai Pandan : Setiap Hari Senin-Minggu, mulai pukul 10:00 s/d 22:00 WIB
                                        </p>
                                    <p>Berikut ini map wisata di Pantai Pandan</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-none d-sm-block mb-5 pb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6997322752727!2d105.841612!3d-6.3031266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e422d5a036aa4b1%3A0x60daca8cbaed52a9!2sPantai%20Pandan%20Carita%20Cafe%20and%20Resto!5e0!3m2!1sid!2sid!4v1716151114676!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-lg-6">
                                <div class="section_title text-center mb_70">
                                    <h3 class="counter">{{ $member }}</h3>
                                    <h3><b>Daftar Member Yang Bergabung</b></h3>
                                    <br><a class="boxed-btn4" href="{{ route('register') }}">Beli Tiket Sekarang!<br></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="counter_wrap">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="single_counter text-center">
                                            <h3 class="counter">{{ $wisata }}</h3>
                <p>Wisata Terpublikasikan</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="single_counter text-center">
                <h3 class="counter">{{ $fasilitas }}</h3>
                <p>Fasilitas Terpublikasikan</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="single_counter text-center">
                <h3 class="counter">{{ $member }}</h3>
                <p>Member Bergabung</p>
            </div>
        </div>
    </div>
</div> --}}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection