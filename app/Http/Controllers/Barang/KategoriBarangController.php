<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Kategori::all();

        return view('admin.barang.kategori-barang.index', compact('barang'));
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
        $kategori = Kategori::insert([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now()
        ]);

        if ($kategori) {
            return redirect()->route('kategori.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('kategori.index')->with('failed', 'Data gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori  = Kategori::where('id_kategori', $id)->first();
        return response()->json($kategori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $barang    = Barang::findOrFail($id);
        // $kategori  = Kategori::all();
        // $satuan    = Satuan::all();
        $kategori = Kategori::findOrFail($id);

        return view('admin.barang.kategori-barang.edit', compact('kategori'));
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
        $kategori                   = Kategori::findOrFail($id);
        $kategori->nama_kategori    = $request->nama_kategori;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();

        return redirect()->route('kategori.index')->with('success', 'Data berhasil diubah');
    }
}
