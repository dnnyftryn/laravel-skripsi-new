<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $fillable = [
        'user_id',
        'invoice_id',
        'nama_pembeli',
        'pembayaran',
        'jatuh_tempo',
        'tanggal_jatuh_tempo',
        'alamat',
        'tanggal'
    ];
}
