<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'user_id',
        'invoice_id',
        'nama_penjual',
        'pembayaran',
        'jatuh_tempo',
        'tanggal_jatuh_tempo',
        'alamat',
        'tanggal'
    ];
}
