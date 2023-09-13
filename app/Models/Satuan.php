<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    public $table = "ms_satuan";

    protected $fillable = [
        'nama_satuan',
        'satuan',
    ];
}
