<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keranjang = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'pembelian')
            ->get();
        $nomor_faktur = 'PEMB-'.date('YmdHis').'-'.rand(1000, 9999);
        $total_bayar = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'pembelian')
            ->sum('total');

        $supplier = \DB::table('supplier')
            ->get();
        
        return view('admin.transaksi.pembelian.index', compact('nomor_faktur', 'keranjang', 'total_bayar', 'supplier'));
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
        $pembelian = new Pembelian;
        $pembelian->invoice_id = $request->nomor_faktur;
        $pembelian->nama_penjual = $request->nama_supplier;
        $pembelian->pembayaran = $request->pembayaran;
        $pembelian->tanggal = $request->tanggal;
        $pembelian->alamat = $request->alamat;

        if ($request->pembayaran == 'kredit') {
            $pembelian->jatuh_tempo = $request->jatuh_tempo;
            $pembelian->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        } else {
            $pembelian->jatuh_tempo = null;
            $pembelian->tanggal_jatuh_tempo = null;
        }

        $pembelian->save();

        $keranjang = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'pembelian')
            ->get();

        foreach ($keranjang as $item) {
            $detail_pembelian = \DB::table('pembelian_detail')
                ->insert([
                    'user_id' => auth()->user()->id, // tambahkan ini untuk mengetahui siapa yang melakukan transaksi, bisa saja diisi dengan '1' atau '2' atau '3' atau '4' atau '5
                    'invoice_id' => $request->nomor_faktur,
                    'kode_barang' => $item->kode_barang,
                    'nama_barang' => $item->nama_barang,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->harga,
                    'satuan' => $item->satuan,
                    'discount' => $item->discount,
                    'total' => $item->total,
                ]);
        }

        \DB::table('keranjang')
        ->where('user_id', auth()->user()->id)
        ->where('status', 'pembelian')
        ->delete();

        return redirect()->route('pembelian.index')->with('success', 'Transaksi pembelian berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // untuk menampilkan detail pembelian
        $pembelian = \DB::table('pembelian')
            ->where('invoice_id', $id)
            ->first();

        $detail_pembelian = \DB::table('pembelian_detail')
            ->where('invoice_id', $id)
            ->get();

        return view('admin.transaksi.faktur', compact('pembelian', 'detail_pembelian'));
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
}
