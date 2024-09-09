@extends('layouts.front')

@section('content')

{{-- <div class="destination_banner_wrap overlay"
        style="background-image: url('{{ $fasilitas->thumbnail == '' ? asset('img/default.png') : url(Storage::url($fasilitas->thumbnail)) }}')">
</div> --}}
<div class="bradcam_area" style="background-image: url('{{ asset('img/selider13.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text-center">
                    <h3 style="color: white; font-weight: bold; font-size: 50px;">FASILITAS WISATA PANTAI PANDAN</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="destination_details_info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-9">
                <div class="destination_info">
                    <h3>{{ $fasilitas->judul }}</b></h3>
                    <div style="text-align: center;">
                        <img src="{{ $fasilitas->thumbnail == '' ? asset('img/default.png') : url(Storage::url($fasilitas->thumbnail)) }}" alt="{{ $fasilitas->judul }}" style="max-width: 100%; height: 300px; display: inline-block;">
                    </div>
                    <br><br>

                    {!! $fasilitas->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?&key={{ env('GMAP_API_KEY') }}&callback=initMap" async defer>
</script>

<script>
    function initMap() {
        const myLatLng = {
            lat: {
                {
                    $wisata - > latitude == '' ? -25.363 : $wisata - > latitude
                }
            },
            lng: {
                {
                    $wisata - > longitude == '' ? 131.044 : $wisata - > longitude
                }
            }
        };
        const map = new google.maps.Map(document.getElementById("gmap"), {
            zoom: 9,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Lokasi {{ $wisata->wisata }}",
        });
    }
</script>
@endpush --}}