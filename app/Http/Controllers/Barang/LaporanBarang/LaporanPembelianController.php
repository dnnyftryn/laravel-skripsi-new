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
        $query = "SELECT * FROM pembelian WHERE ";

        $tanggal_sebelum = $request->tanggal_before;
        $tanggal_sesudah = $request->tanggal_after;

        $nama_pembeli = $request->nama_pembeli;

        $pembayaran = $request->pembayaran;
        $tanggal_japo_sebelum = $request->tanggal_jatuh_tempo_before;
        $tanggal_japo_sesudah = $request->tanggal_jatuh_tempo_after;

        switch ($tanggal_sebelum) {
            case null;
                $query .= "";
                break;

            default:
                $query .= "tanggal = '$tanggal_sebelum'";
        }

        switch ($tanggal_sesudah) {
            case null;
                $query .= "";
                break;

            default:
                $query .= "tanggal BETWEEN '$tanggal_sebelum' AND '$tanggal_sesudah'";
        }

        switch ($nama_pembeli) {
            case null;
                $query .= "";
                break;

            default:
                foreach ($nama_pembeli as $item) {
                    $nama_pembeli_new = "'" . $item . "'";
                }

                // $query .= "AND nama_pembeli IN ($nama_pembeli_new)";
        }


        foreach ($nama_pembeli as $item) {
            $nama_pembeli_new = "'" . $item . "'";
        }

        dd($item);

        return view('admin.barang.laporan-barang.pembelian.result');

    }
}
