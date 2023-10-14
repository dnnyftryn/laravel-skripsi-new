<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Twilio\Rest\Client;

class UserController extends Controller
{
    public function produk()
    {
        $data = \DB::table('barang')->paginate(6);

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.index', compact('data', 'count'));
    }

    public function show($kode_barang)
    {
        $barang = Barang::where('kode_barang', $kode_barang)->first();

        $count = \DB::table('keranjang')
            ->where('user_id', auth()->user()->id)
            ->where('status', 'keranjang_user')
            ->count();

        return view('user.produk.show', compact('barang', 'count'));
    }

    public function keranjang(Request $request, $kode_barang)
    {
        $barang         = Barang::where('kode_barang', $kode_barang)->first();

        $user_id        = auth()->user()->id;
        $jumlah         = $request->typeNumber;

        $harga_barang   = $barang->harga_jual;
        $kode_barang    = $barang->kode_barang;
        $nama_barang    = $barang->nama_barang;

        $total_barang   = $jumlah * $harga_barang;

        $query = \DB::table('keranjang')
            ->insert([
                'user_id' => $user_id,
                'kode_barang' => $kode_barang,
                'nama_barang' => $nama_barang,
                'jumlah' => $jumlah,
                'harga' => $harga_barang,
                'satuan' => "Kg",
                'total' => $total_barang,
                'status' => 'keranjang_user'
            ]);

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
            ->sum('total');

        return view('user.produk.keranjang.index', compact('data', 'count', 'sub_total'));
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
            ->sum('total');
        return view('user.produk.keranjang.checkout', compact('data', 'count', 'sub_total'));
    }

    public function send_wa(Request $request)
    {
        $nomorWhatsAppTujuan = "6282119232351"; // Ganti dengan nomor WhatsApp tujuan yang sesuai
        $pesan = $request->input('pesan'); // Ambil pesan dari formulir

        // Kirim pesan menggunakan Twilio
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $twilio = new Client($sid, $token);

        $twilio->messages->create(
            "whatsapp:$nomorWhatsAppTujuan",
            [
                "from" => "whatsapp:+1234567890", // Ganti dengan nomor WhatsApp Anda
                "body" => $pesan,
            ]
        );

        return redirect()->back()->with('status', 'Pesan telah berhasil dikirim');

    }

    public function sendWhatsApp(Request $request)
    {
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

        foreach($keranjang as $object)
        {
            $nama_barang = $object->nama_barang;
            $jumlah = $object->jumlah;
            $total = $object->harga;
            $subtotal = $request->input('subtotal');

            $message = "Hai Admin!\n

                        Data: $nama_barang
                        ";

            // echo $message;
            echo $nama_barang;
        }

        $tautanWhatsApp = "https://wa.me/{$nomor_whatsapp}?text=" . urlencode($message);

        // return redirect($tautanWhatsApp);

        return view('user.produk.keranjang.redirect', compact('data', 'count', 'sub_total'));
    }
}
