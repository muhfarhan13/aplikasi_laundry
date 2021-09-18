@extends('template.master')

@section('title')

Pelanggan

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a></div>

@endsection

@section('content')

<div class="card-header p-5 bg-white">
    <div class="col-lg-7 m-auto">
        <form method="POST" action="{{ route('simpan_pelanggan') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required
                    placeholder="Nama Member">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="telepon" type="number" class="form-control" name="telepon" value="{{ old('telepon') }}"
                    required placeholder="Telepon Member">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <textarea name="alamat" id="" cols="30" class="form-control" placeholder="Alamat Member"></textarea>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-map-marked-alt"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select name="jenis_kelamin" id="" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-Laki">Laki- Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-genderless"></span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    Tambah
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
