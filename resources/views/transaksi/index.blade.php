@extends('template.master')

@section('title')
    Transaksi
@endsection

@section('page')

    <div class="breadcrumb-item"><a href="/transaksi">Transaksi</a></div>

@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/konfirmasi_selesai" method="post">
        @csrf
        <div class="card-header p-5 bg-white">
            <a href="{{ route('transaksi_tambah') }}" class="btn btn-primary mb-2"><i
                    class="fas fa-plus mr-2"></i>Tambah</a>
            <button type="submit" class="btn btn-success mb-2 ml-3"><i class="fas fa-check mr-2"></i>Konfirmasi Bayar</button>
            <table class="table table-bordered table-responsive-lg table-hover text-center mt-3">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>kode invoice</th>
                        <th>member</th>
                        <th>status</th>
                        <th>pembayaran</th>
                        <th>pajak</th>
                        <th>total harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transaksis as $transaksi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaksi->invoice_kode }}</td>
                            <td>{{ $transaksi->member->nama }}</td>
                            <td>
                                @if ($transaksi->status == 'baru')
                                    <span class="badge badge-warning">Baru</span>
                                @elseif ($transaksi->status == "proses")
                                    <span class="badge badge-primary">Proses</span>
                                @elseif ($transaksi->status == "selesai")
                                    <span class="badge badge-success">Selesai</span>
                                @elseif ($transaksi->status == "diambil")
                                    <span class="badge badge-secondary">Diambil</span>
                                @endif
                            </td>
                            <td>
                                @if ($transaksi->keterangan == 'dibayar')
                                    <span class="badge badge-success">dibayar</span>
                                @else
                                    <span class="badge badge-danger">belum dibayar</span>
                                @endif
                            </td>
                            <td>10%</td>
                            <td>{{ 'Rp . ' . number_format($transaksi->total_harga) }}</td>
                            @if ($transaksi->keterangan == 'dibayar')

                                <td style="width: 20%" class="text-center">
                                    <a href="/transaksi/{{ $transaksi->id }}/edit" class="btn btn-success btn-block">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    
                                </td>
                            @else
                                <td style="width: 20%" class="text-center">
                                    {{-- <label for="">Tandai </label> --}}
                                    <input type="checkbox" name="transaksi[]" id="" value="{{ $transaksi->id }}">
                                </td>
                            @endif

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" align="center">Data Tidak Ditemukan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </form>
@endsection
