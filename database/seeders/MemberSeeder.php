<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberSeeder extends Seeder
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
            Member::create([
                'id_member' => $faker->numberBetween(1000, 10000),
                'nama_member' => $faker->name,
                'alamat_member' => $faker->address,
                'no_telp_member' => $faker->phoneNumber,
                'email_member' => $faker->email,
                'password_member' => Hash::make('password'),
                'status_member' => $faker->numberBetween(0, 1),
                'foto_member' => $faker->imageUrl(640, 480, 'cats'),
                'created_at' => now(),
            ]);
        }
    }
}
