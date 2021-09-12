@extends('template.master')

@section('content')

@if (auth()->user()->level == "admin")
    Selamat datang
@elseif (auth()->user()->level == "kasir")
    Selamat
@endif

@endsection