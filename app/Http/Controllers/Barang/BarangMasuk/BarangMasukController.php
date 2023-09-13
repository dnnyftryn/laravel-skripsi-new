<?php

namespace App\Http\Controllers\Barang\BarangMasuk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Carbon\Carbon;
use DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = BarangMasuk::all();
        return view('admin.barang.barang-masuk.index', compact('barang_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();
        return view ('admin.barang.barang-masuk.create', compact('barang', 'kategori', 'satuan', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal_masuk                  = Carbon::now()->format('Y-m-d H:i:s');
        $barang_masuk                   = new BarangMasuk;
        $barang_masuk->nama_barang      = $request->nama_barang;
        $barang_masuk->kode_barang      = $request->kode_barang;
        $barang_masuk->nama_kategori    = $request->nama_kategori;
        $barang_masuk->jumlah           = $request->jumlah;
        $barang_masuk->satuan           = $request->satuan;
        $barang_masuk->nama_supplier    = $request->nama_supplier;
        $barang_masuk->keterangan       = $request->keterangan;
        $barang_masuk->tanggal_masuk    = $tanggal_masuk;

        $barang_masuk->save();

        DB::select(DB::raw(
            " UPDATE `barang` 
              SET `jumlah` = jumlah + $request->jumlah
              WHERE `barang`.`kode_barang` = '$request->kode_barang';"));

        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang_masuk = BarangMasuk::findOrFail($id);
        $barang = Barang::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();

        return view('admin.barang.barang-masuk.edit', compact('barang_masuk', 'barang', 'kategori', 'satuan', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tanggal_masuk                  = Carbon::now()->format('Y-m-d H:i:s');
        $barang_masuk                   = BarangMasuk::findOrFail($id);
        $barang_masuk->nama_barang      = $request->nama_barang;
        $barang_masuk->kode_barang      = $request->kode_barang;
        $barang_masuk->nama_kategori    = $request->nama_kategori;
        $barang_masuk->jumlah           = $request->jumlah;
        $barang_masuk->satuan           = $request->satuan;
        $barang_masuk->jumlah           = $request->jumlah;
        $barang_masuk->nama_supplier    = $request->nama_supplier;
        $barang_masuk->keterangan       = $request->keterangan;
        $barang_masuk->tanggal_masuk    = $tanggal_masuk;

        $barang_masuk->save();

        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangMasuk::findOrFail($id)->delete();
        return redirect()->route('barang-masuk.index')->with('success', 'Barang Masuk Berhasil Dihapus');
    }
}
