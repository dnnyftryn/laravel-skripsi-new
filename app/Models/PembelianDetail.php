<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;

    protected $table = 'pembelian_detail';

    protected $fillable = [
        'user_id',
        'invoice_id',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'harga_jual',
        'harga_beli',
        'satuan',
        'discount',
        'total'
    ];
}
