@extends('template.master')

@section('content')

@if (auth()->user()->level == "admin")
<div class="container">
    <div class="btn-form mb-3">
        <a href="{{ route('tambah_pengguna') }}" class="btn btn-primary mb-2"><i class="fas fa-plus mr-2"></i>Tambah</a>
    </div>

    <table id="example2" class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th style="width: 10px">No</th>
                <th>Email</th>
                <th>Nama</th>
                <th>level</th>
                <th>Outlet</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-light">
            @forelse($users as $no => $user)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->level }}</td>
                <td>@if ($user->outlet)
                    {{ $user->outlet->nama }}
                    @endif</td>
                <td style="width: 20%" class="text-center">
                    <div class="btn-group" level="group" aria-label="Basic example">
                        <a href="/pengguna/{id}/edit" class="btn btn-info btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <form action="/pengguna/{{$user->id}}" method="post">
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

    {{-- {{ $users->links() }} --}}
</div>
@elseif(auth()->user()->level == "kasir")
{{-- petugas --}}
@elseif(auth()->user()->level == "owner")
{{-- masyarakat --}}
@endif

@endsection
