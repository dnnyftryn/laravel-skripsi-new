<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            ['nama_kategori' => 'Sirloin', 'path' => 'icon/ka'],
            ['nama_kategori' => 'Rib'],
            ['nama_kategori' => 'Chuck'],
            ['nama_kategori' => 'Tenderloin']
        ];

        DB::table('kategori')->insert($kategori);
    }
}
