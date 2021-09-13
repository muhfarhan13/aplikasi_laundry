@extends('template.master')

@section('content')
<div class="container">
    <div class="text-capitalize">
        <h5>{{ __('Nama Member : ') }}<strong>{{ $pelanggans->nama }}</strong></h5>
        <hr>
        <h5>{{ __('Alamat Member : ') }}<strong>{{ $pelanggans->alamat }}</strong></h5>
        <hr>
        <h5>{{ __('jenis kelamin : ') }}
            <strong>
               {{$pelanggans->jenis_kelamin}}
            </strong>
        </h5>
        <hr>
        <h5>{{ __('telepon Member : ') }}<strong>{{ $pelanggans->telepon }}</strong></h5>

        <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary mt-5"><i
                class="fas fa-arrow-left"></i></a>
    </div>
</div>
@endsection
