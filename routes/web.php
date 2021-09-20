<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PaketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/',function(){
    return view('auth.login');
});
Route::group(['middleware' => ['auth', 'CekLevel:admin,kasir']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('tambah_pelanggan');
    Route::post('/pelanggan/tambah', [PelangganController::class, 'store'])->name('simpan_pelanggan');
    Route::get('/pelanggan/{id}', [PelangganController::class, 'show'])->name('detail_pelanggan');
    Route::get('/pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('edit_pelanggan'); 
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('tambah_pengguna');
    Route::POST('/pengguna/tambah', [PenggunaController::class, 'store'])->name('simpan_pengguna');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('edit_pengguna');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('');

    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet'); 
    Route::get('/outlet/tambah', [OutletController::class, 'create'])->name('tambah_outlet');
    Route::post('/outlet/tambah', [OutletController::class, 'store'])->name('simpan_outlet');
    Route::get('/outlet/{id}', [OutletController::class, 'show'])->name('detail_outlet');
    Route::get('/outlet/{id}/edit', [OutletController::class, 'edit'])->name('edit_outlet');
    Route::put('/outlet/{id}', [OutletController::class, 'update'])->name('');
    Route::delete('/outlet/{id}', [OutletController::class, 'destroy'])->name('');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket');
    Route::get('/paket/tambah', [PaketController::class, 'create'])->name('tambah_paket');
    Route::post('/paket/tambah', [PaketController::class, 'store'])->name('simpan_paket');
    Route::get('/paket/{id}', [PaketController::class, 'show'])->name('detail_paket');
    Route::get('/paket/{id}/edit', [PaketController::class, 'edit'])->name('edit_paket');
    Route::put('/paket/{id}', [PaketController::class, 'update'])->name('');
    Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    // Route::get('/transaksi/tambah', [TransaksiController::class, 'create'])->name('transaksi_tambah');
    // Route::get('/transaksi')
});
