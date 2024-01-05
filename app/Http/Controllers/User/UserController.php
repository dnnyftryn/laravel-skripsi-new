<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\User;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function produk()
    {
        $data = \DB::table('barang')->paginate(6);
        
        $id     = auth()->user()->id;
        $user   = User::findOrFail($id);

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.index', compact('data', 'count', 'user'));
    }

    public function show($kode_barang)
    {
        $id     = auth()->user()->id;
        $user   = User::findOrFail($id);

        $barang = Barang::where('kode_barang', $kode_barang)->first();
        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.show', compact('barang', 'count', 'user'));
    }

    public function keranjang(Request $request, $kode_barang)
    {
        $barang         = Barang::where('kode_barang', $kode_barang)->first();

        $user_id        = auth()->user()->id;
        $jumlah         = $request->typeNumber;

        $harga_jual   = $barang->harga_jual;
        $harga_beli   = $barang->harga_jual;

        $kode_barang    = $barang->kode_barang;
        $nama_barang    = $barang->nama_barang;

        $total_beli   = $jumlah * $harga_beli ;
        $total_jual   = $jumlah * $harga_jual ;

        if($jumlah == "0") {
            return redirect()->back()->with('error', 'Jumlah tidak boleh 0');
        }

        $query = \DB::table('keranjang')
            ->updateOrInsert([
                'user_id' => $user_id,
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang
            ],[
                'jumlah' => $jumlah ,
                'harga_jual' => $harga_jual,
                'harga_beli' => $harga_beli,
                'satuan' => "Kg",
                'total_beli' => $total_beli,
                'total_jual' => $total_jual,
                'status' => 'keranjang_user'
            ]
        );

        if ($query) {
            return redirect()->back()->with('success', 'Barang berhasil ditambahkan ke keranjang');
        } else {
            return redirect()->back()->with('error', 'Barang gagal ditambahkan ke keranjang');
        }
    }

    public function show_keranjang()
    {
        $data = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->get();

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        $sub_total = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->sum('total_jual');

        $id     = auth()->user()->id;
        $user   = User::findOrFail($id);

        return view('user.produk.keranjang.index', compact('data', 'count', 'sub_total', 'user'));
    }

    public function cara_pemesanan()
    {
        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.cara-pemesanan.index', compact('count'));
    }

    public function checkout()
    {
        $data = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->get();

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        $sub_total = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->sum('total_jual');
            
        return view('user.produk.keranjang.checkout', compact('data', 'count', 'sub_total'));
    }

    public function sendWhatsApp(Request $request)
    {
        $this->validate($request,[
            'nama_depan' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
            'Telepon' => 'required',
            'tanggal_ambil' => 'required',
         ]);


        $count = \DB::table('keranjang')
                ->where('user_id', auth()->user()->id)
                ->where('status', 'keranjang_user')
                ->count();


        $nomor_whatsapp = "6282119232351";

        $nama_depan = $request->input('nama_depan');
        $nama_belakang = $request->input('nama_belakang');
        $nomor_member = $request->input('nomor_member');
        $negara = $request->input('negara');
        $jalan = $request->input('jalan');
        $alamat = $request->input('alamat');
        $kota = $request->input('kota');
        $provinsi = $request->input('provinsi');
        $kode_pos = $request->input('kode_pos');
        $telepon = $request->input('telepon');
        $email = $request->input('email');
        $tanggal_ambil = $request->input('tanggal_ambil');

        $keranjang = \DB::table('keranjang')
                ->where('user_id', auth()->user()->id)
                ->where('status', 'keranjang_user')
                ->get();

        $total_pesanan = \DB::table('keranjang')
                ->where('user_id', auth()->user()->id)
                ->where('status', 'keranjang_user')
                ->sum('total');

        $message = "Hai Admin!
Nama Depan: $nama_depan
Nama Belakang: $nama_belakang
No. Member: $nomor_member
Negara/Wilayah: $negara
Alamat: $jalan $alamat
Kota: $kota
Provinsi: $provinsi
Kode Pos: $kode_pos
Telepon: $telepon
Email: $email
Tanggal Pengambilan Pesanan: $tanggal_ambil
                    ";

        $total = "";
        $nama_barang = "";
        $jumlah = "";

        foreach($keranjang as $object)
        {
            $nama_barang = $object->nama_barang . " ";
            $jumlah = $object->jumlah . " ";
            $total = $object->harga . " ";
            $subtotal = $request->input('subtotal');

            $pesanan = "
Nama : $nama_barang - $jumlah - Subtotal : $total
";
            $message .= $pesanan;
        }
        $message .= "
Total : Rp." . $total_pesanan;

        $tautanWhatsApp = "https://wa.me/{$nomor_whatsapp}?text=" . urlencode($message);

        return redirect($tautanWhatsApp);
    }

    public function edit_user($id) 
    {
        $user = User::findOrFail($id);

        return view('auth.edit', compact('user'));
    }

    public function update_user(Request $request, $id) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user                 = User::findOrfail($id);
        $user->name    = $request->name;
        $user->email    = $request->email;
        $user->password         = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.home')->with('success', 'Data berhasil diupdate');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('admin.user.index', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        User::findOrfail($id)->delete();

        return redirect()
                ->route('user.index')
                ->with('success', 'Data user berhasil dihapus!');
    }
}
