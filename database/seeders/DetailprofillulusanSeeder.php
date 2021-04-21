<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailprofillulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Detailprofillulusan::insert([
            [
                'code' => 'CPL-01',
                'detail' => "Berpikir kolaboratif dan kemitraan",
                'profil_id' => "Data Scientist",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-02',
                'detail' => "Refleksi diri sebagai bagian dari strategi pembelajaran seumur hidup yang diperlukan oleh 
                seorang profesional ilmu data dan praktisi reflektif",
                'profil_id' => "Data Scientist",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-03',
                'detail' => "Selalu belajar pemikiran dan tren saat ini dan baru dalam bidang ilmu data dan disiplin terkait",
                'profil_id' => "Data Scientist",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-04',
                'detail' => "Memahami aspek hukum dan bisnis dari teknologi dan media",
                'profil_id' => "Data Scientist",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-05',
                'detail' => "Memahami hubungan antar data, etika, dan masyarakat",
                'profil_id' => "Data Scientist",
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ]);
    }
}
