<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    
    protected $table = 'barang_keluar';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'nama_kategori',
        'jumlah',
        'satuan',
        'nama_supplier',
        'keterangan',
        'tanggal_keluar'
    ];
}
