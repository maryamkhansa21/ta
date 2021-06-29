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
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-02',
                'detail' => "Refleksi diri sebagai bagian dari strategi pembelajaran seumur hidup yang diperlukan oleh 
                seorang profesional ilmu data dan praktisi reflektif",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-03',
                'detail' => "Selalu belajar pemikiran dan tren saat ini dan baru dalam bidang ilmu data dan disiplin terkait",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-04',
                'detail' => "Memahami aspek hukum dan bisnis dari teknologi dan media",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-05',
                'detail' => "Memahami hasil-hasil penelitian saat ini dan pekerjaan pengembangan di bidang analitik data besar dan 
                ilmu data",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-06',
                'detail' => "Memahami hubungan antar data, etika, dan masyarakat",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-07',
                'detail' => "Memahami konsep, teknik, dan alat sains data untuk mendukung analitik data besar",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-08',
                'detail' => "Memahami permasalahan hukum dan etika terkait dengan memperoleh dan menganalisis data besar, dan 
                menyajikan hasil analisis data besar kepada para pemangku kepentingan",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-09',
                'detail' => "Memahami sistem dan operasi data",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'code' => 'CPL-10',
                'detail' => "Memiliki pemahaman data, informasi, dan pengetahuan",
                'profil_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ]);
    }
}
