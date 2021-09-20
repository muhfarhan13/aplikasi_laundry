@extends('template.master')

@section('title')

Paket

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/paket">Paket</a></div>

@endsection

@section('content')

<div class="card-header p-5 bg-white">
    <a href="{{ route('tambah_paket') }}" class="btn btn-primary mb-4"><i class="fas fa-plus mr-2"></i>Tambah</a>

    <table class="table table-bordered table-responsive-lg table-hover">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Paket</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Outlet</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pakets as $paket)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $paket->nama_paket }}</td>
                <td>{{ $paket->jenis }}</td>
                <td>{{ 'Rp. '. number_format($paket->harga) }}</td>
                <td>{{ $paket->outlet->nama }}</td>
                <td style="width: 20%" class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/paket/{{$paket->id}}/edit" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="/paket/{{$paket->id}}" class="btn btn-warning text-light btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="/paket/{{$paket->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data ? ');">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
