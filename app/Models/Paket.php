<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

        protected $table = "pakets";

    protected $fillable = [
        "outlet_id",
        "jenis",
        "nama_paket",
        "harga",
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function detail_transaksi()
    {
        return $this->hasOne(Detail_transaksi::class);
    }
}
