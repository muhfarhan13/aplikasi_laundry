@extends('template.master')

@section('title')

Paket

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/paket">Paket</a></div>

@endsection

@section('content')
<div class="card-header p-5 bg-white">
    <div class="col-lg-7 m-auto">
        <form action="/paket/{{ $pakets->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="nama" type="text" class="form-control" name="nama"
                    value="{{ old('nama', $pakets->nama_paket) }}" required autocomplete="nama" autofocus
                    placeholder="Nama Paket">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select name="jenis" id="jenis" class="form-control">
                    <option value="{{ $pakets->jenis }}">{{ $pakets->jenis }}</option>
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="lain">Lain-Lain</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="harga" type="number" class="form-control" name="harga"
                    value="{{ old('harga', $pakets->harga) }}" required autocomplete="harga" autofocus
                    placeholder="Harga Paket">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="outlet">
                    <option value="{{ $pakets->outlet_id }}">
                        {{ $pakets->outlet->nama }}
                    </option>
                    @foreach ($outlets as $outlet)
                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
