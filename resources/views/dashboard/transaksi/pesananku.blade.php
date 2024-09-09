@extends('layouts.admin')

@section('content')
<div class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- subscribe start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Pesanan Saya</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('dashboard.create') }}"
                                    class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i>
                                    Buat Pesanan Baru</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0 lara-dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama</th>
                                        <th>K.Usia</th>
                                        <th>Kunjungan</th>
                                        <th>Jml Orang & Hari</th>
                                        <th>Jml Tiket</th>
                                        <th>Tanggal Kedatangan </th>
                                        <th>Metode Pembayaran </th>
                                        <th>Nama Akun Pelanggan </th>
                                        <th>Nomor Rekening Pelanggan </th>
                                        <th>Grand Total</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $item)
                                        <tr>
                                            <td width="10">{{ $loop->iteration }}</td>
                                            <td>{{ $item->trans_code }}</td>
                                            <td>{{ $userName }}</td>
                                            <td>{{ $item->category_age }}</td>
                                            <td>{{ $item->visited }}</td>
                                            <td>
                                                {{ $item->people_count }} Orang & {{ $item->days }} Hari
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->check_in)->locale('id_ID')->isoFormat('dddd, D MMMM Y') }}
                                            </td>
                                            <td>{{ $item->payment_method }}</td>
                                            <td>{{ $item->account_name }}</td>
                                            <td>{{ $item->account_number }}</td>
                                            <td>{{ "Rp. " . number_format($item->grand_total, 0, ",", ".") }}</td>
                                            <td>
                                                <img src="{{ ($item->payment_proof == '') ? asset('img/default.png') : url(Storage::url($item->payment_proof)) }}"
                                                    alt="" style="width: 50px">
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge badge-success">
                                                        <i class="feather icon-check-circle mr-2"></i>Pembayaran Sudah Lunas
                                                    </div>
                                                @else
                                                    <div class="badge badge-warning">
                                                        <i class="feather icon-check-circle mr-2"></i>Pembayaran Belum Lunas
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('dashboard.transaction.print', $item->id) }}"
                                                    class="btn btn-info btn-sm">Cetak Tiket</a>
                                                <a href="{{ route('dashboard.transaction.show', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Upload Bukti</a>
                                                <form method="POST"
                                                    action="{{ route('dashboard.transaction.destroy', $item->id) }}"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm delete-button">Delete</button>
                                                </form>
                                                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#laporModal-{{ $item->id }}">Message
                                                </a>
                                                @if (auth()->user()->role === 'member')
                                                    @if ($item->complaints->where('seenForAdmin', 0)->count() != 0)
                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{ $item->complaints->where('seenForAdmin', 0)->count() }}
                                                        </span>
                                                    @endif
                                                @else
                                                    @if ($item->complaints->where('seen', 0)->count() != 0)
                                                        <span
                                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                            {{ $item->complaints->where('seen', 0)->count() }}
                                                        </span>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                        <!-- Modal untuk setiap transaksi -->
                                        <div class="modal fade" id="laporModal-{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="laporModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Message</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d-flex flex-column">
                                                        @foreach ($item->complaints as $complaint)
                                                            <div
                                                                class="d-flex flex-row align-items-center mb-2 @if ($complaint->user_id) justify-content-end @endif">
                                                                <img src="{{ ($complaint->user->avatar == '') ? asset('img/default.png') : url(Storage::url($complaint->user->avatar)) }}"
                                                                    alt="{{ $complaint->user->name }}"
                                                                    style="max-width: 30px; max-height: 30px"
                                                                    class="rounded-circle mx-2">
                                                                <label class="my-1">{{ $complaint->user->name }}</label>
                                                            </div>
                                                            <p class="border rounded mx-2 mb-4 p-2 fw-normal">
                                                                {{ $complaint->body }}
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                    <form action="{{ route('dashboard.transaction.report', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <label for="phone_number"
                                                                    class="col-sm-3 col-form-label">Kirim pesan baru:
                                                                </label>
                                                                <input type="text" class="form-control col-sm-7" name="body"
                                                                    required>
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                    name="transaction_id">
                                                                <input type="submit" class="btn btn-success col-sm-2"
                                                                    name="submit" value="Submit" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- subscribe end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
@endsection