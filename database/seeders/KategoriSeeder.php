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
            ['nama_kategori' => 'Sirloin', 'path' => 'icon/kategori/daging-sapi.jpg'],
            ['nama_kategori' => 'Rib', 'path' => 'icon/kategori/rib-sapi.jpg'],
            ['nama_kategori' => 'Chuck', 'path' => 'icon/kategori/chuck-sapi.jpg'],
            ['nama_kategori' => 'Tenderloin', 'path' => 'icon/kategori/tenderloin-sapi.jpg']
        ];

        DB::table('kategori')->insert($kategori);
    }
}
