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

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.index', compact('data', 'count'));
    }

    public function show($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.show', compact('barang', 'count'));
    }

    public function keranjang(Request $request, $kode_barang)
    {
        $barang         = Barang::where('kode_barang', $kode_barang)->first();

        $user_id        = auth()->user()->id;
        $jumlah         = $request->typeNumber;

        $harga_barang   = $barang->harga_jual;
        $kode_barang    = $barang->kode_barang;
        $nama_barang    = $barang->nama_barang;

        $total_barang   = $jumlah * $harga_barang;

        $query = \DB::table('keranjang')
            ->insert([
                'user_id' => $user_id,
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'harga' => $harga_barang,
                'satuan' => "Kg",
                'total' => $total_barang,
                'status' => 'keranjang_user'
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang');
        } else {
            return redirect()->back()->with('error', 'Barang gagal ditambahkan ke keranjang');
        }
    }

    public function show_keranjang()
    {
        $data = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->get();

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        $sub_total = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->sum('total');

        return view('user.produk.keranjang.index', compact('data', 'count', 'sub_total'));
    }

    public function cara_pemesanan()
    {
        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.cara-pemesanan.index', compact('count'));
    }
}
