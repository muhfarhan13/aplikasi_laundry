@extends('template.master')

@section('content')

<div class="container">
    <h4 class="text-primary"><i class="fas fa-store m-2"></i>{{ $outlets->nama }}</h4>
    <div class="row m-3">
        <h6 class="col-4"><i class="fas fa-map-marked-alt mx-1"></i>{{ $outlets->alamat }}</h6>
        <h6 class="col-9"><i class="fas fa-phone mx-1"></i>{{ $outlets->telepon }}</h6>
    </div>
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary mt-5"><i
            class="fas fa-arrow-left"></i></a>
</div>

@endsection
