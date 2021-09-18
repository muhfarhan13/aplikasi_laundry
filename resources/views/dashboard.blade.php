@extends('template.master')

@section('content')

@section('title')
    
Dashboard

@endsection

@if (auth()->user()->level == "admin")

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-user-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pengguna</h4>
                </div>
                <div class="card-body">
                    {{ $countPenggunas }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fas fa-store"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Outlet</h4>
                </div>
                <div class="card-body">
                    {{ $countOutlets }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pelanggan</h4>
                </div>
                <div class="card-body">
                    {{ $countPelanggans }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Paket</h4>
                </div>
                <div class="card-body">
                    {{ $countPakets }}
                </div>
            </div>
        </div>
    </div>
</div>

@elseif (auth()->user()->level == "kasir")
Selamat

@elseif (auth()->user()->level == "owner")
Selamat datang owner

@endif

@endsection
