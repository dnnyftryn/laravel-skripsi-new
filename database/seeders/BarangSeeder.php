<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Barang')->insert([

            [
                'kode_barang' => 001,
                'nama_barang' => 'Daging Sirloin',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_barang' => '002',
                'nama_barang' => 'Daging Rib Eye',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '003',
                'nama_barang' => 'Daging T-Bone',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '004',
                'nama_barang' => 'Daging Chuck',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '005',
                'nama_barang' => 'Daging Brisket',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '006',
                'nama_barang' => 'Daging Flank',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '007',
                'nama_barang' => 'Daging Shank',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '008',
                'nama_barang' => 'Daging Short Rib',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '009',
                'nama_barang' => 'Daging Striploin',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'kode_barang' => '010',
                'nama_barang' => 'Daging Rump Steak',
                'nama_kategori' => 'Daging Sapi',
                'deskripsi' => '',
                'jumlah' => '20',
                'harga_beli' => '30000',
                'harga_jual' => '32000',
                'satuan' => 'kg',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
