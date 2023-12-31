<?php

namespace Database\Seeders;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create('id_ID');
        $data = [
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'type' => 3
            ], 
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'type' => 1
            ]
        ];
        DB::table('users')->insert($data);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password'),
                'type' => $faker->numberBetween(0, 3),
                'created_at' => now(),
            ]);
        }
    }
}
