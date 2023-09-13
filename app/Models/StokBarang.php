<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;
    protected $table = "stok_barang";
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'merk',
        'stok_kecil',
        'stok_besar',
        'harga_jual',
        'harga_beli',
    ];
}
