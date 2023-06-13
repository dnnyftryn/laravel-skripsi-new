<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'nama_kategori',
        'jumlah',
        'satuan',
        'nama_supplier',
        'keterangan',
        'tanggal_masuk'
    ];
    
}
