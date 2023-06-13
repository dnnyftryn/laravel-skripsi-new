<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kasir;
use App\Models\Member;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $users = User::latest()->count('id');
            $barang = Barang::latest()->count('id');
            $supplier = Supplier::latest()->count('id');
            $member = Member::latest()->count('id');
            $transaksi = Penjualan::orderBy('jatuh_tempo', 'DESC')->get();
            // $kasir = Kasir::latest()->count('id');
            return view('admin.dashboard', compact('users', 'barang', 'supplier', 'member', 'transaksi'));
        } else {
            return view('auth.login');
        }
    }
}
