<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
               'name'=>'Admin',
               'email'=>'admin@uutbeef.com',
               'type'=>1,
               'password' => Hash::make('12345678'),
               'created_at' => now()
            ],
            [
                'name'=>'User',
                'email'=>'user@uutbeef.com',
                'type'=>0,
                'password' => Hash::make('12345678'),
                'created_at' => now()
             ],
             [
                'name'=>'Manager',
                'email'=>'manager@uutbeef.com',
                'type'=>2,
                'password' => Hash::make('12345678'),
                'created_at' => now()
             ]
        ]);
    }
}
