@extends('template.master')

@section('title')

Pengguna

@endsection

@section('page')

<div class="breadcrumb-item"><a href="/pengguna">Pengguna</a></div>

@endsection

@section('content')

<div class="card-header p-5 bg-white">
    <div class="row">
        <div class="col-lg-7 m-auto">
            <form method="POST" action="">
                @csrf
                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                        autocomplete="name" autofocus placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                        autocomplete="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control" name="password"
                        autocomplete="new-password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select class="form-control" name="level" required>
                        <option value="">- Pilih -</option>
                        <option value="admin">admin</option>
                        <option value="owner">owner</option>
                        <option value="kasir">kasir</option>
                    </select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-tag"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select class="form-control" name="outlet">
                        <option value="">- Pilih -</option>
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
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
