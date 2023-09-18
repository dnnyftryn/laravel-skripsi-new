<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function store_pembelian(Request $request)
    {
        $user_id = auth()->user()->id;
        $kode_barang = $request->kode_barang;
        $nama_barang = $request->nama_barang;
        $jumlah = $request->jumlah;
        $harga = $request->harga_new;
        $satuan = $request->satuan;
        $discount = $request->discount;
        $total = $request->total_keranjang_new;

        $query = \DB::table('keranjang')
            ->insert([
                'user_id' => $user_id,
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'satuan' => $satuan,
                'discount' => $discount,
                'total' => $total,
                'status' => 'pembelian'
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang');
        } else {
            return redirect()->back()->with('error', 'Barang gagal ditambahkan ke keranjang');
        }
    }

    public function store_penjualan(Request $request)
    {
        $user_id = auth()->user()->id;
        $kode_barang = $request->kode_barang;
        $nama_barang = $request->nama_barang;
        $jumlah = $request->jumlah;
        $harga = $request->harga;
        $satuan = $request->satuan;
        $discount = $request->discount;
        $total = $request->total_keranjang_new;

        $query = \DB::table('keranjang')
            ->insert([
                'user_id' => $user_id,
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'harga' => $harga,
                'satuan' => $satuan,
                'discount' => $discount,
                'total' => $total,
                'status' => 'penjualan'
            ]);

        if ($query) {
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang');
        } else {
            return redirect()->back()->with('error', 'Barang gagal ditambahkan ke keranjang');
        }
    }

    public function destroy($id)
    {
        $query = \DB::table('keranjang')
            ->where('id', $id)
            ->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang');
        } else {
            return redirect()->back()->with('error', 'Barang gagal dihapus dari keranjang');
        }
    }
}
