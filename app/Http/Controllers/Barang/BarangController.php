<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;

use App\Models\Kategori;
use App\Models\Satuan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $count_barang = Barang::count();
        $tersedia = Barang::where('jumlah', '>=', 10)->count();
        $akan_habis = Barang::where('jumlah', '<=', 10)->count();
        $habis = Barang::where('jumlah', '=', 0)->count();
        $count_barang_masuk = BarangMasuk::count();
        $count_barang_keluar = BarangKeluar::count();
        return view('admin.barang.index', compact('habis' ,'akan_habis', 'tersedia' ,'barang', 'count_barang', 'count_barang_masuk', 'count_barang_keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('.admin.barang.create', compact('kategori', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang                 = new Barang;
        $barang->kode_barang    = $request->kode_barang;
        $barang->nama_barang    = $request->nama_barang;
        $barang->nama_kategori  = $request->nama_kategori;
        $barang->satuan         = $request->satuan;
        $barang->harga_jual         = $request->harga_jual;
        $barang->harga_beli         = $request->harga_beli;
        $barang->image          = $request->file('image')->store('barang-images');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan!');
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
        $barang    = Barang::findOrFail($id);
        $kategori  = Kategori::all();
        $satuan    = Satuan::all();

        return view('admin.barang.edit', compact('barang', 'kategori', 'satuan'));
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
        $barang                 = Barang::findOrfail($id);
        $barang->kode_barang    = $request->kode_barang;
        $barang->nama_barang    = $request->nama_barang;
        $barang->jumlah         = $request->jumlah;
        $barang->image          = $request->file('image')->store('barang-images');
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}
