<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\DetailController;

use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Barang\StokBarangController;
use App\Http\Controllers\Barang\KategoriBarangController;
use App\Http\Controllers\Barang\LaporanBarang\LaporanPembelianController;
use App\Http\Controllers\Barang\LaporanBarang\LaporanPenjualanController;

use App\Http\Controllers\Barang\BarangMasuk\BarangMasukController;
use App\Http\Controllers\Barang\BarangKeluar\BarangKeluarController;

use App\Http\Controllers\StockOpnameController;

use App\Http\Controllers\Transaksi\PembelianController;
use App\Http\Controllers\Transaksi\PenjualanController;
use App\Http\Controllers\Transaksi\KeranjangController;

use App\Models\User;
use App\Models\Barang;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('search', function (Request $request) {
    $query = $request->get('query');
    $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
    return response()->json($filterResult);
});

Route::get('kode_barang', function (Request $request) {
    $query = $request->get('kode_barang');
    $filterResult = Barang::where('kode_barang', 'LIKE', '%'. $query. '%')->get();
    $array = array();
    foreach ($filterResult as $key => $value) {
        $array[] = $value->kode_barang;
    }
    return response()->json($array);
});

Route::get('nama_barang', function (Request $request) {
    $query = $request->get('nama_barang');
    $filterResult = Barang::where('nama_barang', 'LIKE', '%'. $query. '%')->get();
    $array = array();
    foreach ($filterResult as $key => $value) {
        $array[] = $value->nama_barang;
    }
    return response()->json($array);
});

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::get('getSupplier/{id}', function ($id) {
    $merk = App\Models\Supplier::where('id',$id)->get();
    return response()->json($merk);
});


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'userHome'])->name('user.home');
    Route::get('/produk', [UserController::class, 'produk'])->name('produk.index');
    Route::get('/produk/{kode_barang}', [UserController::class, 'show'])->name('produk.show');
    Route::get('/cara-pemesanan', [UserController::class, 'cara_pemesanan'])->name('cara_pemesanan.index');
    Route::post('/user/keranjang/{kode_barang}', [UserController::class, 'keranjang'])->name('keranjang.index');
    Route::get('/user/keranjang', [UserController::class, 'show_keranjang'])->name('keranjang.show');
    Route::delete('/user/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang_user.destroy');
    Route::get('/user/checkout', [UserController::class, 'checkout'])->name('keranjang.checkout');
    // Route::post('/user/checkout/send', [UserController::class, 'send_wa'])->name('send.wa');
    Route::post('/user/checkout/send', [UserController::class, 'sendWhatsApp'])->name('send.wa');

    Route::get('/detail-produk/{kode_barang}', [DetailController::class, 'show'])->name('detail-produk.index');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/{id}', [DashboardAdminController::class, 'show'])->name('admin.show');

    Route::get('/print-faktur-pembelian/{id}', [DashboardAdminController::class, 'print_faktur_pembelian'])->name('print_faktur_pembelian');

    Route::get('/kodebarang', [StockOpnameController::class, 'getKodeBarang'])->name('kodebarang.index');

    Route::get('/laporan-pembelian-cari', [LaporanPembelianController::class, 'cari'])->name('laporan_pembelian.cari');
    Route::get('/laporan-penjualan-cari', [LaporanPenjualanController::class, 'cari'])->name('laporan_penjualan.cari');

    Route::get('/laporan-pembelian-cari-detail', [LaporanPembelianController::class, 'cari_detail'])->name('laporan_pembelian-detail.cari');
    Route::get('/laporan-penjualan-cari-detail', [LaporanPenjualanController::class, 'cari_detail'])->name('laporan_penjualan-detail.cari');

    Route::post('/keranjang/pembelian/store', [KeranjangController::class, 'store_pembelian'])->name('keranjang_pembelian.store');
    Route::post('/keranjang/penjualan/store', [KeranjangController::class, 'store_penjualan'])->name('keranjang_penjualan.store');


    Route::get('/laporan-penjualan-detail', [LaporanPenjualanController::class, 'index_detail'])->name('detail-penjualan.index');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    Route::resource('/barang', BarangController::class);
    Route::resource('/stok-barang', StokBarangController::class);
    Route::resource('/barang-masuk', BarangMasukController::class);
    Route::resource('/barang-keluar', BarangKeluarController::class);
    Route::resource('/stock-opname', StockOpnameController::class);
    Route::resource('/pembelian', PembelianController::class);
    Route::resource('/penjualan', PenjualanController::class);
    Route::resource('/kategori', KategoriBarangController::class);
    Route::resource('/stok-opname', StokBarangController::class);
    Route::resource('/laporan-penjualan', LaporanPenjualanController::class);
    Route::resource('/laporan-pembelian', LaporanPembelianController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager', [HomeController::class, 'managerHome'])->name('manager.home');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:warehouse'])->group(function () {

    Route::get('/warehouse', [HomeController::class, 'warehouseHome'])->name('warehouse.home');
});
