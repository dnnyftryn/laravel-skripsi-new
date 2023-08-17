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
        DB::table('member')->insert([
            [
                'id_member' => '102121',
                'nama_member' => 'dans',
                'alamat_member' => 'ini alamat',
                'no_telp_member' => '012931232',
                'email_member' => 'dans@gmail.com',
                'password_member' => 'asdadas',
                'status_member' => 'sadas',
                'foto_member' => 'gaada',
            ],
            [
                'id_member' => '232324',
                'nama_member' => 'member',
                'alamat_member' => 'member',
                'no_telp_member' => 'member',
                'email_member' => 'member',
                'password_member' => 'member',
                'status_member' => 'member',
                'foto_member' => 'member',
            ]
        ]);
    }
}
