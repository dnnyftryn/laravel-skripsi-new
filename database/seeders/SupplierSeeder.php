<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $table->string('nama_supplier');
        //     $table->string('nama_pic');
        //     $table->string('nomor_hp');
        //     $table->string('alamat');
        DB::table('supplier')->insert([
            [
                'nama_supplier' => 'BOS DAGING',
                'nama_pic' => 'BOS DAGING',
                'nomor_hp' => '08123456789',
                'alamat' => 'Jl. Tengah Tani',
            ],
            [
                'nama_supplier' => 'CV. Faqih Mandiri Beef',
                'nama_pic' => 'Faqih',
                'nomor_hp' => '08123456789',
                'alamat' => 'Jl. Abd.Rojak Blok Kavling BTN Griya Indah Kebonpring Lor, Arjawinangun, Kec. Arjawinangun, Kabupaten Cirebon',
            ],
            [
                'nama_supplier' => 'CV.Ads Kartini',
                'nama_pic' => 'Ads Kartini',
                'nomor_hp' => '08123456789',
                'alamat' => ' Jl mangga raya. dsn Sukamanah timur, RT.3/RW.3, desa, Cikampek Bar., Kec. Cikampek, Karawang',
            ],
            [
                'nama_supplier' => 'CV.Barokah Mandiri Beef',
                'nama_pic' => 'Barokah Mandiri Beef',
                'nomor_hp' => '08123456789',
                'alamat' => 'Jatimulya, Kec. Tambun Sel., Kabupaten Bekasi',
            ],
            [
                'nama_supplier' => 'Halala Meat Shop',
                'nama_pic' => 'Halala Meat Shop',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT. Jaya Perkasa Internasional',
                'nama_pic' => 'PT. Jaya Perkasa Internasional',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT. Karunia Pangan Nusantara',
                'nama_pic' => 'PT. Karunia Pangan Nusantara',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT. KHARISMA CAHAYA ABADI',
                'nama_pic' => 'PT. KHARISMA CAHAYA ABADI',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT. Sarana Inti Pangan',
                'nama_pic' => 'PT. Sarana Inti Pangan',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Dua Putra Perkasa Pratama',
                'nama_pic' => 'PT.Dua Putra Perkasa Pratama',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Frosa Prima Abadi',
                'nama_pic' => 'PT.Frosa Prima Abadi',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Indogal Agro Trading',
                'nama_pic' => 'PT.Indogal Agro Trading',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Pangan Nusantara',
                'nama_pic' => 'PT.Pangan Nusantara',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Pangan Nusantara',
                'nama_pic' => 'PT.Pangan Nusantara',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'UUTBEEF',
                'nama_pic' => 'UUTBEEF',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'SR',
                'nama_pic' => 'SR',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Sukses International Anugerah',
                'nama_pic' => 'PT.Sukses International Anugerah',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Sinar Wijaya Utama',
                'nama_pic' => 'PT.Sinar Wijaya Utama',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],
            [
                'nama_supplier' => 'PT.Rass Mandiri Utama',
                'nama_pic' => 'PT.Rass Mandiri Utama',
                'nomor_hp' => '08123456789',
                'alamat' => '-',
            ],








        
        ]);
    }
}
