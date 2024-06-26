<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_satuan')->insert([
            [
                'nama_satuan' => 'kilogram',
                'satuan' => 'kg',
            ],
            [
                'nama_satuan' => 'karton',
                'satuan' => 'karton',
            ]
        ]);
    }
}
