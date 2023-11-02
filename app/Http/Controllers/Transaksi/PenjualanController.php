<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoice = 'PENJ-'.date('YmdHis').'-'.rand(1000, 9999);
        $total = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'penjualan')
            ->sum('total_jual');
        $member = \DB::table('member')
            ->select('id_member', 'nama_member')
            ->get();
        $keranjang = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'penjualan')
            ->get();

        return view('admin.transaksi.penjualan.index', compact('invoice', 'total', 'member', 'keranjang'));
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
        $this->validate($request,[
            'nomor_faktur' => 'required',
            'pembayaran' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required'
        ]);

        $penjualan                  = new Penjualan;
        $penjualan->invoice_id      = $request->nomor_faktur;
        $penjualan->user_id         = auth()->user()->id;
        $penjualan->nama_pembeli    = $request->nama_member;
        $penjualan->pembayaran      = $request->pembayaran;
        $penjualan->tanggal         = $request->tanggal;
        $penjualan->alamat          = $request->alamat;

        if ($request->pembayaran == 'kredit') {
            $penjualan->jatuh_tempo = $request->hari;

            $date                           = Carbon::parse($request->tanggal);
            $new_date                       = $date->addDays($request->hari);
            $penjualan->tanggal_jatuh_tempo = $new_date;
        } else {
            $penjualan->jatuh_tempo = null;
            $penjualan->tanggal_jatuh_tempo = date('Y-m-d');
        }

        $penjualan->save();

        $keranjang = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'penjualan')
            ->get();

        foreach ($keranjang as $item) {

             $laba = $item->total_beli - $item->total_jual;

            $detail_pembelian = \DB::table('penjualan_detail')
                ->insert([
                    // tambahkan ini untuk mengetahui siapa yang melakukan transaksi, bisa saja diisi dengan '1' atau '2' atau '3' atau '4' atau '5
                    'user_id' => auth()->user()->id,
                    'invoice_id' => $request->nomor_faktur,
                    'kode_barang' => $item->kode_barang,
                    'nama_barang' => $item->nama_barang,
                    'jumlah' => $item->jumlah,
                    'harga_jual' => $item->harga_jual,
                    'harga_beli' => $item->harga_beli,
                    'satuan' => $item->satuan,
                    'discount' => $item->discount,
                    'total_jual' => $item->total_jual,
                    'total_beli' => $item->total_beli,
                    'laba' => $laba,
                    'created_at' => date('Y-m-d H:i:s')
                ]);

            $barang = \DB::table('barang')
                ->where('kode_barang', $item->kode_barang)
                ->first();

            $stok = $barang->jumlah - $item->jumlah;

            $update_stok = \DB::table('barang')
                ->where('kode_barang', $item->kode_barang)
                ->update([
                    'jumlah' => $stok,
                ]);
        }

        \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'penjualan')
            ->delete();

        return redirect()->route('penjualan.index')->with('success', 'Transaksi penjualan berhasil disimpan');
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
}
