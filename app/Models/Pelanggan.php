<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = "pelanggans";

    protected $fillable = [
        "nama",
        "alamat",
        "jenis_kelamin",
        "telepon",
    ];

    public function transaksi()
    {
        return $this->hasMany(Paket::class);
    }
}
