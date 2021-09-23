@extends('template.master')
@section('title')
    Transaksi
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

    <form action="/transaksi/tambah/proses" class="card" method="post">
            @csrf
        <div class="card-body">
            <div class="form-group mb-4">
                <label for="">Jumlah Kg : </label>
                <input type="number" name="qty" id="" class="form-control" placeholder="Jumlah Cucian,misal : (3 Kg) ,3"
                    aria-describedby="helpId">
                <small id="helpId" class="text-muted">Quantity / Kg</small>
            </div>
            <div class="form-group mb-4">
                <label for="">Pilih Paket Laundry : </label>
                <select class="form-control" name="paket_id" id="">
                    <option value="" disabled selected>== Pilih Paket Laundry ==</option>
                    @foreach ($paket as $paket)
                        <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-4">
                        <label for="">Pelanggan : </label>
                        <select class="form-control" name="pelanggan_id" id="">
                            <option value="" disabled selected>== Pilih Pelanggan ( Nama | Alamat )==</option>
                            @foreach ($pelanggan as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }} | {{ $pelanggan->alamat }}</option>
                            @endforeach
                        </select>
                    </div>
        </div>
    </form>
@endsection
