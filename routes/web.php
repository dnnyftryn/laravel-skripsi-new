<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Barang\BarangController;
use App\Http\Controllers\Barang\StokBarangController;

use App\Http\Controllers\Barang\BarangMasuk\BarangMasukController;
use App\Http\Controllers\Barang\BarangKeluar\BarangKeluarController;

use App\Http\Controllers\StockOpnameController;

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
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('admin.index');

    Route::resource('/barang', BarangController::class);
    Route::resource('/stok-barang', StokBarangController::class);
    Route::resource('/barang-masuk', BarangMasukController::class);
    Route::resource('/barang-keluar', BarangKeluarController::class);
    Route::resource('/stock-opname', StockOpnameController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:warehouse'])->group(function () {
  
    Route::get('/warehouse/home', [HomeController::class, 'warehouseHome'])->name('warehouse.home');
});
