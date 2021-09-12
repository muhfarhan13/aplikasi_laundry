@extends('template.master')

@section('content')

@if (auth()->user()->level == "admin")
<div class="container">
    <a href="{{ route('tambah_pelanggan') }}" class="btn btn-primary mb-2"><i class="fas fa-plus mr-2"></i>Tambah</a>

    <table id="example2" class="table table-bordered table-hover text-capitalize">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $no => $pelanggan)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->alamat }}</td>
                <td>{{ $pelanggan->jenis_kelamin }}</td>
                <td>{{ $pelanggan->telepon }}</td>
                {{-- <td>@if ($pelanggan->outlet)
                    {{ $pelanggan->outlet->nama }}
                @endif</td> --}}
                <td style="width: 20%" class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/pelanggan/{{$pelanggan->id}}/edit" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="/pelanggan/{{$pelanggan->id}}" class="btn btn-warning text-light btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="/pelanggan/{{$pelanggan->id}}" method="post">
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
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i></a>
</div>

@elseif(auth()->user()->level == "kasir")
<div class="container">
    <a href="{{ route('tambah_pelanggan') }}" class="btn btn-primary mb-2"><i class="fas fa-plus mr-2"></i>Tambah</a>

    <table id="example2" class="table table-bordered table-hover text-capitalize">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $no => $pelanggan)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $pelanggan->nama }}</td>
                <td>{{ $pelanggan->alamat }}</td>
                <td>{{ $pelanggan->jenis_kelamin }}</td>
                <td>{{ $pelanggan->telepon }}</td>
                {{-- <td>@if ($pelanggan->outlet)
                    {{ $pelanggan->outlet->nama }}
                @endif</td> --}}
                <td style="width: 20%" class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/pelanggan/{{$pelanggan->id}}/edit" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="/pelanggan/{{$pelanggan->id}}" class="btn btn-warning text-light btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form action="/pelanggan/{{$pelanggan->id}}" method="post">
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
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i></a>
</div>
@endif

@endsection
