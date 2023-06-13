<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            [
                'kode_barang' => 'BRG001',
                'nama_barang' => 'Beras',
                'nama_kategori' => 'Makanan',
                'jumlah' => 100,
                'harga_jual' => 10000,
                'harga_beli' => 5000,
                'satuan' => 'Kg',
                'image' => 'beras.jpg',
                'created_at' => now()
            ],
            [
                'kode_barang' => 'BRG002',
                'nama_barang' => 'Gula',
                'nama_kategori' => 'Makanan',
                'jumlah' => 100,
                'harga_jual' => 10000,
                'harga_beli' => 5000,
                'satuan' => 'Kg',
                'image' => 'gula.jpg',
                'created_at' => now()
            ],
            [
                'kode_barang' => 'BRG003',
                'nama_barang' => 'Minyak Goreng',
                'nama_kategori' => 'Makanan',
                'jumlah' => 100,
                'harga_jual' => 10000,
                'harga_beli' => 5000,
                'satuan' => 'Kg',
                'image' => 'minyak-goreng.jpg',
                'created_at' => now()
            ],
            [
                'kode_barang' => 'BRG004',
                'nama_barang' => 'Susu',
                'nama_kategori' => 'Makanan',
                'jumlah' => 100,
                'harga_jual' => 10000,
                'harga_beli' => 5000,
                'satuan' => 'Kg',
                'image' => 'susu.jpg',
                'created_at' => now()
            ],
            [
                'kode_barang' => 'BRG005',
                'nama_barang' => 'Telur',
                'nama_kategori' => 'Makanan',
                'jumlah' => 100,
                'harga_jual' => 10000,
                'harga_beli' => 5000,
                'satuan' => 'Kg',
                'image' => 'telur.jpg',
                'created_at' => now()
            ]
        ]);
    }
}
