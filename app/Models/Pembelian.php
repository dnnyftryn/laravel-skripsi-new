<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'jumlah_barang',
        'harga_barang',
        'total_harga',
        'pembayaran',
        'nama_penjual'
    ];
}
