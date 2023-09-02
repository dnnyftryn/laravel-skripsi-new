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
       $faker = \Faker\Factory::create('id_ID');

       for ($i = 0; $i < 10; $i++) {
        Barang::create([
            'kode_barang' => $faker->numberBetween(1000, 10000), // 'App\Models\Barang
            'nama_barang' => $faker->name,
            'nama_kategori' => $faker->name, // 'App\Models\Kategori
            'jumlah' => $faker->numberBetween(1, 100),
            'harga_beli' => $faker->numberBetween(1000, 10000),
            'harga_jual' => $faker->numberBetween(1000, 10000),
            'satuan' => 'karton', // 'App\Models\Satuan
            'created_at' => now()
        ]);
       }
    }
}
