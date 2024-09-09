@extends('layouts.admin')

@section('content')
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $title }}</h5>

                    </div>
                    <div class="card-body">
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
                        <form method="POST" action="{{ route('booking') }}">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Kategori Usia</label>
                                    <select class="form-control" name="category_age" id="category_age">
                                        <option value="Dewasa">Dewasa</option>
                                        <option value="Anak-anak">Anak-anak</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Harga Tiket Perorang</label>
                                    <input type="text" name="grand_total" id="grand_total" class="form-control"
                                        disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Weekday/Weekend</label>
                                    <select class="form-control" name="visited" id="visited">
                                        <option value="Weekday">Weekday</option>
                                        <option value="Weekend">Weekend</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Jumlah Orang</label>
                                    <input type="number" name="people_count" id="people_count" max="250" min="1"
                                        placeholder="Berapa Orang?" value="1" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Jumlah Tiket</label>
                                    <input type="hidden" name="quantity" id="ticket_count" min="1" max="250" value="1">
                                    <input type="number" id="ticket_count_display" min="1" max="250"
                                        placeholder="Berapa Tiket?" value="1" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Tanggal Datang</label>
                                    <input type="date" class="form-control" name="check_in" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label id="days_label">Berapa Hari</label>
                                    <input type="number" name="days" id="days_input" min="1" max="7"
                                        placeholder="Berapa Hari?" value="1" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Data Pembayaran</label>
                                    <select class="form-control" name="payment_method" id="payment_method">
                                        @foreach($paymentMethods as $method)
                                            <option value="{{ $method->payment_method }}">{{ $method->payment_method }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nama Rekening Anda</label>
                                    <input type="text" name="account_name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nomor Rekening Anda</label>
                                    <input type="number" name="account_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col d-none">
                                    <label>Tempat Wisata</label>
                                    <select class="form-control" name="wisata" id="wisata">
                                        @foreach($wisata as $w)
                                            <option value="{{ $w->id }}">{{ $w->wisata }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="form-group col">
                                    <label>Harga Wisata</label>
                                    <select class="form-control" name="wisata_price" id="wisata_price" disabled>
                                        @foreach($tickets as $t)
                                            <option value="{{ $t->price }}" data-ticket-id="{{ $t->id }}">{{ $t->price }}
                                            </option>
                                        @endforeach
                                        <input type="hidden" name="ticket_id" id="ticket_id">
                                    </select>

                                </div>
                            </div>
                            <div class="form-row d-none">
                                <div class="form-group col">
                                    <label>Harga Wisata</label>
                                    <input type="number" id="price" name="price">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Form Pesan -->
                                <div class="col-md-12">
                                    <textarea name="message" id="message" cols="30" rows="10"
                                        placeholder="Pesan/Catatan" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-end">
                                <span class="m-20">Total Harga: <b id="total_price"></b></span>
                            </div>
                            {{-- <div class="form-row">
                                <!-- Tombol Pesan -->
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn4" type="submit" style="width: 100%;">Pesan</button>
                                    </div>
                                </div>
                            </div> --}}
                            <button type="submit" class="form-control btn btn-primary">Pesan Tiket</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categoryAgeSelect = document.getElementById("category_age");
            const hargaTiketSelect = document.getElementById("grand_total");
            const kunjunganSelect = document.getElementById("visited");
            const wisataPrice = document.getElementById("wisata_price");
            const daysLabel = document.getElementById("days_label");
            const daysInput = document.getElementById("days_input");
            const totalPrice = document.getElementById("total_price");
            const peopleCount = document.getElementById("people_count")
            const ticketCount = document.getElementById('ticket_count')
            const ticketCountDisplay = document.getElementById('ticket_count_display')
            const price = document.getElementById("price")
            // let grandTotalElement = document.getElementById('grand_total');

            categoryAgeSelect.addEventListener("change", function () {
                updateHargaTiket()
                updateTotalPrice()
            });
            kunjunganSelect.addEventListener("change", function () {
                updateHargaTiket()
                updateTotalPrice()
            });
            daysInput.addEventListener("keyup", function () {
                updateDaysLabel()
                updateTotalPrice()
            });
            daysInput.addEventListener("click", function () {
                updateDaysLabel()
                updateTotalPrice()
            });
            peopleCount.addEventListener("keyup", function () {
                updateTotalPrice()
            });
            peopleCount.addEventListener("click", function () {
                updateTotalPrice()
            });
            ticketCount.addEventListener("keyup", function () {
                updateTotalPrice()
            });
            // grandTotalElement.value = <?php echo $grandTotal ?? ''; ?>

            function updateHargaTiket() {
                const categoryAge = categoryAgeSelect.value;
                const kunjungan = kunjunganSelect.value;
                const selectedOption = wisataPrice.options[wisataPrice.selectedIndex];
                const ticketId = selectedOption.getAttribute('data-ticket-id');

                document.getElementById('ticket_id').value = ticketId;

                if (categoryAge === "Dewasa" && kunjungan === "Weekday" || categoryAge === "Anak-anak" && kunjungan === "Weekday") {
                    hargaTiketSelect.value = formatRupiah(wisataPrice.value);
                } else if (categoryAge === "Dewasa" && kunjungan === "Weekend" || categoryAge === "Anak-anak" && kunjungan === "Weekend") {
                    hargaTiketSelect.value = formatRupiah(`${Number(wisataPrice.value) + 20000}`);
                }
                // if (categoryAge === "Dewasa" && kunjungan === "Weekday") {
                //     hargaTiketSelect.value = formatRupiah(wisataPrice.value);
                // } else if (categoryAge === "Anak-anak" && kunjungan === "Weekday") {
                //     hargaTiketSelect.value = formatRupiah(`${Number(wisataPrice.value) - 15000}`);
                // } else if (categoryAge === "Dewasa" && kunjungan === "Weekend") {
                //     hargaTiketSelect.value = formatRupiah(`${Number(wisataPrice.value) + 5000}`);
                // } else if (categoryAge === "Anak-anak" && kunjungan === "Weekend") {
                //     hargaTiketSelect.value = formatRupiah(`${Number(wisataPrice.value) - 15000 + 5000}`);
                // }
            }

            function updateDaysLabel() {
                const value = daysInput.value
                daysLabel.innerHTML = `Berapa Hari ${value > 1 ? `(+ ${formatRupiah(0)})` : ""}`
            }

            function formatRupiah(angka, prefix = 'Rp ') {
                const numberString = angka.replace(/[^,\d]/g, '').toString(); // Clean the input
                const split = numberString.split(',');
                const sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                const ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    const separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

                return prefix + rupiah;
            }

            function updateTotalPrice() {
                const hargaPerOrang = rupiahToNumber(hargaTiketSelect.value)
                const hargaTotalOrang = hargaPerOrang * Number(peopleCount.value)

                const jumlahOrang = Number(peopleCount.value);
                const hitungTiketPerOrang = jumlahOrang * 1;
                const tiketPerOrang = hitungTiketPerOrang;

                ticketCount.value = tiketPerOrang; // Update hidden quantity value
                ticketCountDisplay.value = tiketPerOrang; // Update display quantity value
                console.log('Updated quantity:', tiketPerOrang);

                const totalHargaHari = daysInput.value > 1 ? (daysInput.value - 1) * 0 : 0;
                totalPrice.innerHTML = formatRupiah(`${hargaTotalOrang + totalHargaHari}`)
                price.value = hargaTotalOrang + totalHargaHari

            }

            function rupiahToNumber(rupiah) {
                return parseInt(rupiah.replace(/[^0-9]/g, ''), 10);
            }

            updateHargaTiket();
            updateDaysLabel();
            updateTotalPrice();
        });
    </script>
    <!-- CKEditor -->
    <script src="{{ asset('admin_theme') }}/assets/plugins/ckeditor/ckeditor.js"></script>
@endpush