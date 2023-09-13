<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Member;
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
        $nama_pembeli = Member::all();
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

        $query = "SELECT * FROM pembelian";

        if ($request->tanggal_after == null) {
            $tanggal_sebelum = $request->tanggal_before;
            $tanggal_sesudah = $request->tanggal_before;
            
            $query .= "tanggal = '$tanggal_sebelum'";
        } else {
            $tanggal_sebelum = $request->tanggal_before;
            $tanggal_sesudah = $request->tanggal_after;

            $query .= "WHERE tanggal BETWEEN '$tanggal_sebelum' AND '$tanggal_sesudah'";
        }

        if ($request->tanggal_jatuh_tempo_after == null) {
            $tanggal_sebelum_japo = $request->tanggal_jatuh_tempo_before;
            $tanggal_sesudah_japo = $request->tanggal_jatuh_tempo_before;

            $query .= "tanggal = '$tanggal_sebelum_japo'";
            
        } else {
            $tanggal_sebelum_japo = $request->tanggal_jatuh_tempo_before;
            $tanggal_sesudah_japo = $request->tanggal_jatuh_tempo_after;

            $query .= "tanggal BETWEEN '$tanggal_sebelum_japo'";
        }

        $nama_pembeli = $request->nama_pembeli;
        $nama_pembeli = implode(', ', $nama_pembeli);

        $pembayaran = $request->pembayaran;

        
        
        dd($query);

        return view('admin.barang.laporan-barang.pembelian.result');   

    }
}
