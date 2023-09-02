<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = [
        'id_member',
        'nama_member',
        'alamat_member',
        'no_telp_member',
        'email_member',
        'password_member',
        'status_member',
        'foto_member',
        'created_at',
    ];
}
