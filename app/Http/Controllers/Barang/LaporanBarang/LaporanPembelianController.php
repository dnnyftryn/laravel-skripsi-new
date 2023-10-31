<?php

namespace App\Http\Controllers\Barang\LaporanBarang;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class LaporanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nama_pembeli = Supplier::all();
        return view('admin.barang.laporan-barang.pembelian.index', compact('nama_pembeli'));
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
        //
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


    /**
     * controller ini untuk mencari laporan
     */

     public function cari(Request $request)
     {
        $this->validate($request, [
            'tanggal_before' => 'required',
            'tanggal_after' => 'required'
        ]);

        $tanggal_sebelum = $request->tanggal_before;
        $tanggal_sesudah = $request->tanggal_after;

        $data = \DB::table('penjualan')
                ->whereBetween('tanggal', [$tanggal_sebelum, $tanggal_sesudah])
                ->get();

        return view('admin.barang.laporan-barang.pembelian.result', compact('data'));

     }
}
