<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member')
        ->insert ([
            [
                'id_member' => 'MEM001',
                'nama_member' => 'Rizky',
                'alamat' => 'Jl. Raya',
                'no_telp' => '08123456789'
            ],
            [
                'id_member' => 'MEM002',
                'nama_member' => 'Rizky',
                'alamat' => 'Jl. Raya',
                'no_telp' => '08123456789'
            ],
            [
                'id_member' => 'MEM003',
                'nama_member' => 'Rizky',
                'alamat' => 'Jl. Raya',
                'no_telp' => '08123456789'
            ],
            [
                'id_member' => 'MEM004',
                'nama_member' => 'Rizky',
                'alamat' => 'Jl. Raya',
                'no_telp' => '08123456789'
            ]
        ]);
    }
}
