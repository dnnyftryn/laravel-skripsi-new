<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    public $table = "stock_opname";

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stok_aplikasi',
        'stok_fisik',
        'selisih',
        'created_at',
    ];
}
