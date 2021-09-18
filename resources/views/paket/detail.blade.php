@extends('template.master')

@section('title')

Paket

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/paket">Paket</a></div>

@endsection

@section('content')
<div class="card-header p-5 bg-white">
    <h5>Nama paket: {{ $pakets->nama_paket }}</h5>
    <hr>
    <h5>Jenis paket: {{ $pakets->jenis }}</h5>
    <hr>
    <h5>Harga paket: {{ 'Rp . ' . number_format($pakets->harga) }}</h5>
    <hr>
    <h5>Ada di outlet: {{ $pakets->outlet->nama }}</h5>
</div>
@endsection
