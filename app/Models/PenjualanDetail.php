<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $table = 'penjualan_detail';

    protected $fillable = [
        'invoice_id',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'harga',
        'satuan',
        'discount',
        'total'
    ];
}
