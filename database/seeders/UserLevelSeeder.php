<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ms_level_users')->insert([
            [
                'nama_level' => 'User',
                'type' => 0
            ],
            [
                'nama_level' => 'Admin',
                'type' => 1
            ],
            [
                'nama_level' => 'Manager',
                'type' => 2
            ],
        ]);
    }
}
