@extends('template.master')

@section('content')

<div class="container">
    <a href="{{ route('tambah_outlet') }}" class="btn btn-primary mb-2"><i class="fas fa-plus mr-2"></i>Tambah</a>

    <table id="example2" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Owner</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($outlets as $no => $outlet)
            <td>{{ ++$no }}</td>
            <td>{{ $outlet->nama }}</td>
            <td>
                @if ($outlet->user)
                {{ $outlet->user->name }}
                @else
                <a href="{{ route('pengguna') }}" class="text-danger text-xs mb-3">Atur Owner Di Bagian Menu
                    Pengguna</a>
                @endif
            </td>
            <td>{{ $outlet->telepon }}</td>
            <td>{{ $outlet->alamat }}</td>
            <td style="width: 20%" class="text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/outlet/{{$outlet->id}}/edit" class="btn btn-info btn-sm">
                        <i class="far fa-edit"></i>
                    </a>
                    <a href="/outlet/{{$outlet->id}}" class="btn btn-warning text-light btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <form action="/outlet/{{$outlet->id}}" method="post">
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
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
            class="fas fa-arrow-left"></i></a>
</div>

@endsection