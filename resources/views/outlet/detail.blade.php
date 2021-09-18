@extends('template.master')

@section('title')
    
Outlet

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/outlet">Outlet</a></div>

@endsection

@section('content')

<div class="card-header p-5 bg-white">
    <h4 class="text-primary"><i class="fas fa-store m-2"></i>{{ $outlets->nama }}</h4>
    <div class="row m-3">
        <h6 class="col-4"><i class="fas fa-map-marked-alt mx-2"></i>{{ $outlets->alamat }}</h6>
        <h6 class="col-9"><i class="fas fa-phone mx-2"></i>{{ $outlets->telepon }}</h6>
    </div>
</div>

@endsection
