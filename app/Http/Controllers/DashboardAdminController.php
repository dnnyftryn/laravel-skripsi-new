<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kasir;
use App\Models\Member;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Pembelian;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::latest()->count('id');
            $barang = Barang::latest()->count('id');
            $supplier = Supplier::latest()->count('id');
            $penjualan = Penjualan::all();
            $pembelian = \DB::table('pembelian')->get();
            // $member = Member::latest()->count('id');
            // $transaksi = Penjualan::orderBy('jatuh_tempo', 'DESC')->get();
            // $kasir = Kasir::latest()->count('id');
            return view('admin.dashboard', compact('users', 'barang', 'supplier', 'penjualan', 'pembelian'));
        } else {
            return view('auth.login');
        }
    }

    public function show($id)
    {
        // untuk menampilkan detail pembelian
        $pembelian = \DB::table('pembelian')
            ->where('invoice_id', $id)
            ->first();

        $detail_pembelian = \DB::table('pembelian_detail')
            ->where('invoice_id', $id)
            ->get();

        return view('admin.transaksi.faktur', compact('pembelian', 'detail_pembelian'));
    }
}
