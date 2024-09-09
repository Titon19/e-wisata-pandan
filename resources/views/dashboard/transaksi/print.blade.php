@extends('layouts.print')

@section('content')
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice" style="margin: 30px 30px 0; border: none">
        {{-- <div class="row invoice-info">

            </div> --}}
        <!-- /.row -->
        {{-- <br> --}}
        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>Kode Transaksi</th>
                            <th>Nama</th>
                            {{-- <th>K.Usia</th>
                                <th>Kunjungan</th> --}}
                            {{-- <th>Jml Orang & Hari</th> --}}
                            <th>Tanggal Kedatangan</th>
                            <th>Metode Pembayaran</th>
                            <th>Nama Akun Pelanggan</th>
                            <th>Nomor Rekening Pelanggan</th>
                            <th>Grand Total</th>
                            <th>Status Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $transaction->trans_code }}</td>
                            <td>{{ $userName }}</td>
                            {{-- <td>{{ $transaction->category_age }}</td>
                            <td>{{ $transaction->visited }}</td> --}}
                            {{-- <td>
                                    {{ $transaction->people_count }} Orang & {{ $transaction->days }} Hari
                            </td> --}}
                            <td>{{ \Carbon\Carbon::parse($transaction->check_in)->locale('id_ID')->isoFormat('dddd, D MMMM Y') }}</td>
                            <td>{{ $transaction->payment_method }}</td>
                            <td>{{ $transaction->account_name }}</td>
                            <td>{{ $transaction->account_number }}</td>
                            <td>{{ "Rp. " . number_format($transaction->grand_total, 0, ",",".") }}</td>
                            <td>
                                @if ($transaction->status == 1)
                                <div class="badge badge-success">
                                    <i class="feather icon-check-circle mr-2"></i>Pembayaran Sudah Lunas
                                </div>
                                @else
                                <div class="badge badge-warning">
                                    <i class="feather icon-check-circle mr-2"></i>Pembayaran Belum Lunas
                                </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">

            </div>
            <!-- /.col -->
            <div class="col-6">

                <div class="table-responsive">
                    <table class="table">
                        {{-- <tr>
                                <th>Total:</th>
                                <td style="font-weight: bold">Rp {{ $order->transaction->total }}</td>
                        </tr> --}}
                    </table>
                </div>
                <p class="lead">Your Payment Was Successful &nbsp; &nbsp;<i class="fas fa-check"></i> <br></p>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection

<script type="text/javascript">
    <!--
    window.print();
    //
    -->
</script>