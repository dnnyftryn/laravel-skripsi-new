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
use Illuminate\Http\Request;
use PDF;

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

        // $pdf = PDF::loadview('admin.transaksi.penjualan.faktur_pembelian', compact('pembelian', 'detail_pembelian', 'date', 'sub_total', 'discount', 'total'));
        
        // $pdf_path = 'faktur_pembelian_' . $pembelian->invoice_id . '.pdf';
        
        // if (file_exists($pdf_path)) {
        //     unlink($pdf_path);
        // } else {
        //     $pdf->save($pdf_path);
        // }

        // return $pdf->stream();
    }
}
