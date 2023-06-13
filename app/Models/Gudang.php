<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected  $table = 'gudang';

    protected $fillable = [
        'name',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'created_at',
        'updated_at',
    ];
}
