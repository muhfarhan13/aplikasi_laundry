@extends('template.master')

@section('title')
Transaksi
@endsection

@section('page')

<div class="breadcrumb-item"><a href="/transaksi">Transaksi</a></div>

@endsection

@section('content')
<div class="card-header p-5 bg-white">
    <a href="" class="btn btn-primary mb-2"><i class="fas fa-plus mr-2"></i>Tambah</a>
    <a href="" class="btn btn-success mb-2 ml-3"><i class="fas fa-check mr-2"></i>Konfirmasi Pembayaran</a>

    <table class="table table-bordered table-responsive-lg table-hover text-center mt-3">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>kode invoice</th>
                <th>member</th>
                <th>status</th>
                <th>pembayaran</th>
                <th>total harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $transaksi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaksi->kode_invoice }}</td>
                <td>{{ $transaksi->member->nama }}</td>
                <td>@if ($transaksi->status == "baru")
                    <span class="badge badge-warning">Baru</span>
                    @elseif ($transaksi->status == "proses")
                    <span class="badge badge-primary">Proses</span>
                    @elseif ($transaksi->status == "selesai")
                    <span class="badge badge-success">Selesai</span>
                    @elseif ($transaksi->status == "diambil")
                    <span class="badge badge-secondary">Diambil</span>
                    @endif
                </td>
                <td>@if ($transaksi->dibayar == "dibayar")
                    <span class="badge badge-success">dibayar</span>
                    @else
                    <span class="badge badge-danger">belum dibayar</span>
                    @endif</td>
                <td>{{ "Rp . " . number_format($transaksi->detail_transaksi->total_harga) }}</td>
                <td style="width: 20%" class="text-center">
                    <a href="/transaksi/{{$transaksi->id}}/edit" class="btn btn-success btn-block">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" align="center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
