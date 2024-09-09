@extends('layouts.front')

@section('content')
<div class="bradcam_area" style="background-image: url('{{ asset('img/selider12.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center">
                    <h3 style="color: white; font-weight: bold; font-size: 50px;">CONTACT US <br> PANTAI PANDAN</h3>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="contact-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Lokasi Pantai Pandan</h3>
                        <p>JL. Raya Carita No.29, Sukajadi, Kecamatan Carita, Kabupaten Pandeglang, Banten.</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>Phone</h3>
                        <p>+62 878 6611 01171</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3><a href="javascript:void(0)" class="__cf_email__">pantaipandan@gmail.com</a></h3>
                        <p>Kirim email kepada kami kapan saja</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h2 class="contact-title">Kontak Kami</h2>
                @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{ $item }}
                </div>
                @endforeach
                @endif
                <form class="form-contact contact_form" action="{{ route('contact_form.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pesan'" placeholder=" Pesan"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subjek'" placeholder="Subjek">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm boxed-btn">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-none d-sm-block mb-5 pb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6997322752727!2d105.841612!3d-6.3031266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e422d5a036aa4b1%3A0x60daca8cbaed52a9!2sPantai%20Pandan%20Carita%20Cafe%20and%20Resto!5e0!3m2!1sid!2sid!4v1716151114676!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

</section>
@endsection