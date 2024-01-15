<?php

namespace App\Http\Controllers\Barang\BarangKeluar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BarangKeluar;
use App\Models\Supplier;
use App\Models\Satuan;
use App\Models\Kategori;
use App\Models\Barang;
use Carbon\Carbon;
use DB; 

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_keluar = BarangKeluar::all();
        return view('admin.barang.barang-keluar.index', compact('barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $satuan = Satuan::all();
        $kategori = Kategori::all();
        $barang = Barang::all();
        return view('admin.barang.barang-keluar.create', compact('supplier', 'satuan', 'kategori', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required'
        ]);
        
        $barang_keluar                 = new BarangKeluar;
        $barang_keluar->nama_barang    = $request->nama_barang;
        $barang_keluar->kode_barang    = $request->kode_barang;
        $barang_keluar->nama_kategori  = $request->nama_kategori;
        $barang_keluar->jumlah         = $request->jumlah;
        $barang_keluar->satuan         = $request->satuan;
        $barang_keluar->nama_supplier  = $request->nama_supplier;
        $barang_keluar->keterangan     = $request->keterangan;
        $barang_keluar->tanggal_keluar = Carbon::now()->format('Y-m-d H:i:s');

        $barang_keluar->save();

        DB::select(DB::raw(
            " UPDATE `barang` 
              SET `jumlah` = jumlah - $request->jumlah
              WHERE `barang`.`kode_barang` = '$request->kode_barang';"));
        
        return redirect()->route('barang-keluar.index')->with('success', 'Barang Keluar Berhasil Ditambahkan'); 
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
        $barang_keluar = BarangKeluar::findOrFail($id);
        $supplier = Supplier::all();
        $satuan = Satuan::all();
        $kategori = Kategori::all();
        $barang = Barang::all();
        return view('admin.barang.barang-keluar.edit', compact('barang_keluar', 'supplier', 'satuan', 'kategori', 'barang'));
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
        $barang_keluar = BarangKeluar::findOrFail($id);
        $barang_keluar->nama_barang    = $request->nama_barang;
        $barang_keluar->kode_barang    = $request->kode_barang;
        $barang_keluar->nama_kategori  = $request->nama_kategori;
        $barang_keluar->jumlah         = $request->jumlah;
        $barang_keluar->satuan         = $request->satuan;
        $barang_keluar->nama_supplier  = $request->nama_supplier;
        $barang_keluar->keterangan     = $request->keterangan;
        $barang_keluar->tanggal_keluar = Carbon::now()->format('Y-m-d H:i:s');
        $barang_keluar->save();
        
        return redirect()->route('barang-keluar.index')->with('success', 'Barang Keluar Berhasil Diubah'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BarangKeluar::findOrFail($id)->delete();
        return redirect()->route('barang-keluar.index')->with('success', 'Barang Keluar Berhasil Dihapus');
    }
}
