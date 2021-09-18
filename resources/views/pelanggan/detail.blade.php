@extends('template.master')

@section('title')

Pelanggan

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/pelanggan">Pelanggan</a></div>

@endsection

@section('content')
<div class="card-header p-5 bg-white">
    <h5>Nama member: {{ $pelanggans->nama }}</h5>
    <hr>
    <h5>Alamat member: {{ $pelanggans->alamat }}</h5>
    <hr>
    <h5>Jenis Kelamin:

        {{$pelanggans->jenis_kelamin}}

    </h5>
    <hr>
    <h5>Telepon member: {{ $pelanggans->telepon }}</h5>
</div>
@endsection
