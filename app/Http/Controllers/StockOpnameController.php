<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\StockOpname;

class StockOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $stock_opname = StockOpname::all();
        return view('admin.stock-opname.index', compact('barang', 'stock_opname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_opname = new StockOpname;
        $stock_opname->nama_barang = $request->nama_barang;
        $stock_opname->kode_barang = $request->kode_barang;
        $stock_opname->stok_aplikasi = $request->stok_aplikasi;
        $stock_opname->stok_fisik = $request->stok_fisik;
        $stock_opname->selisih = $stock_opname->stok_aplikasi - $stock_opname->stok_fisik;

        $stock_opname->save();

        return redirect()->route('stock-opname.index')->with('success', 'Stock Opname Berhasil Ditambahkan!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getKodeBarang()
    {
        $barang = Barang::all();
        return response()->json($barang);
    }
}
