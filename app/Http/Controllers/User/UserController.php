<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class UserController extends Controller
{
    public function produk()
    {
        $data = \DB::table('barang')->paginate(6);
        return view('user.produk.index', compact('data'));
    }

    public function show($kode_barang) {
        $barang = Barang::where('kode_barang', $kode_barang)->first();
        return view('user.produk.show', compact('barang'));
    }
}
