<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "transaksis";

    protected $fillable = [
        'invoice_kode', 'outlet_id', 'pelanggan_id', 'paket_id', 'qty', 'total_harga', 'keterangan', 'status'
    ];
    // protected $with = ['outlet', 'pelanggan', 'paket'];
    // public function detail_transaksi()
    // {
    //     return $this->hasOne(Detail_transaksi::class);
    // }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function member()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
