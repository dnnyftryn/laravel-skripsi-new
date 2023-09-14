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
            'tanggal_before' => 'required'
        ]);
        $str = "SELECT * FROM pembelian WHERE ";

        $tanggal_sebelum = $request->tanggal_before;
        $tanggal_sesudah = $request->tanggal_after;

        $nama_pembeli = $request->nama_pembeli;

        $pembayaran = $request->pembayaran;
        $tanggal_japo_sebelum = $request->tanggal_jatuh_tempo_before;
        $tanggal_japo_sesudah = $request->tanggal_jatuh_tempo_after;

        switch ($tanggal_sebelum) {
            case null;
                $str .= "";
                break;

            default:
                if ($tanggal_sesudah != null) {
                    $str .= "tanggal BETWEEN '$tanggal_sebelum' AND '$tanggal_sesudah'";
                } else {
                    $str .= "tanggal = '$tanggal_sebelum'";
                }
        }

        switch ($nama_pembeli) {
            case null;
                $str .= "";
                break;

            default:
                $nama_pembeli = implode("', '", $nama_pembeli);

                $str .= "AND nama_penjual IN ('$nama_pembeli')";
        }

        $query = \DB::select(\DB::raw($str));
        dd($str);

        return view('admin.barang.laporan-barang.pembelian.result');

    }
}
