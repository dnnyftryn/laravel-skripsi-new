<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();

        return view('admin.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.create');
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
            'nama' => 'required',
            'nama_pic' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $nama = $request->nama;
        $nama_pic = $request->nama_pic;
        $no_hp = $request->no_hp;
        $alamat = $request->alamat; 

        $supplier = \DB::table('supplier')
                        ->insert([
                            'nama_supplier' => $nama,
                            'nama_pic' => $nama_pic,
                            'nomor_hp' => $no_hp,
                            'alamat' => $alamat
                        ]);

        if ($supplier) {
            return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil ditambahkan!');
        } else {
            return redirect()->route('supplier.create')->with('error', 'Data Supplier gagal ditambahkan!');
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
        $supplier = Supplier::findOrFail($id);

        return view('admin.supplier.edit', compact('supplier'));
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
        $supplier                   = Supplier::findOrFail($id);
        $supplier->nama_supplier    = $request->nama;
        $supplier->nama_pic         = $request->nama_pic;
        $supplier->nomor_hp         = $request->no_hp;
        $supplier->alamat           = $request->alamat; 

        $supplier->save();

        return redirect()->route('supplier.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::find($id)->delete();

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus!');
    }
}
