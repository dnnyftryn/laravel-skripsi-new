<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kasir;
use App\Models\Member;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class DashboardAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::latest()->count('id');
            $supplier = Supplier::latest()->count('id');

            $barang_masuk = BarangMasuk::latest()->count('id');
            $barang_keluar = BarangKeluar::latest()->count('id');

            $penjualan = Penjualan::all();
            $pembelian = Pembelian::all();
            
            $transaksi_penjualan = Penjualan::orderBy('jatuh_tempo', 'DESC')->get();
            $transaksi_pembelian = Pembelian::orderBy('jatuh_tempo', 'DESC')->get();

            return view('admin.dashboard', compact(
                'users',
                'supplier', 
                'barang_masuk', 
                'barang_keluar', 
                'penjualan', 
                'pembelian',
                'transaksi_penjualan',
                'transaksi_pembelian',
                )
            );
        } else {
            return view('auth.login');
        }
    }

    public function show($id)
    {
        // untuk menampilkan detail pembelian
        $pembelian = \DB::table('penjualan')
            ->where('id', $id)
            ->first();

        $date = date('d F Y', strtotime($pembelian->tanggal));
        $pembelian->tanggal = $date;

        $detail_pembelian = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->get();

        $sub_total = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->sum('total');

        $discount = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->sum('discount');

        $total = $sub_total - $discount;

        return view('admin.transaksi.penjualan.faktur_pembelian', compact('pembelian', 'detail_pembelian', 'date', 'sub_total', 'discount', 'total'));
    }

    public function print_faktur_pembelian($id)
    {
         // untuk menampilkan detail pembelian
        $pembelian = \DB::table('penjualan')
            ->where('id', $id)
            ->first();


        $date = date('d F Y', strtotime($pembelian->tanggal));
        $pembelian->tanggal = $date;

        $detail_pembelian = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->get();

        $sub_total = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->sum('total');

        $discount = \DB::table('penjualan_detail')
            ->where('invoice_id', $pembelian->invoice_id)
            ->sum('discount');

        $total = $sub_total - $discount;

        define('DOMPDF_TEMP_DIR', storage_path('temp')); // Set temporary path

        $html = view('admin.transaksi.faktur_pembelian_print', compact('pembelian', 'detail_pembelian', 'date', 'sub_total', 'discount', 'total'))->render();
        $pdf = PDF::loadHtml($html);
        return $pdf->stream();
    }
}
