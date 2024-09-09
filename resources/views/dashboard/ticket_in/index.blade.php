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
                        <h5>Master Restock Tiket</h5>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="{{ route('dashboard.ticket_in.create') }}"
                                    class="btn btn-success btn-sm mb-3 btn-round"><i class="feather icon-plus"></i>
                                    Tambah Restock Tiket</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0 lara-dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Tiket</th>
                                        <th>Stok lama</th>
                                        <th>Stok Masuk</th>
                                        <th>Stok Baru</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ticketsIn as $item)
                                        <tr>
                                            <td width="10">{{ $loop->iteration }}</td>
                                            <td>{{ $item->ticket->ticket_name }}</td>
                                            <td>{{ $item->old_stock }}</td>
                                            <td>{{ $item->in_stock }}</td>
                                            <td>{{ $item->new_stock }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('dashboard.ticket_in.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <form method="POST"
                                                    action="{{ route('dashboard.ticket_in.destroy', $item->id) }}"
                                                    class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm delete-button">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
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