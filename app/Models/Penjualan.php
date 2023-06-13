<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_member',
        'invoice',
        'alamat',
        'pembayaran',
        'hari',
        'jatuh_tempo',
        'total',
        'status'
    ];
}
