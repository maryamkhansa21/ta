<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class ProfillulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Profillulusan::insert([
            [
                'id' => 1,
                'profillulusan' => "Data Scientist",
                'deskripsi' => 'Data Scientist mampu menganalisis dan menginterpretasikan data dalam jumlah sangat besar, baik
                terstruktur dan tidak terstruktur, untuk mendeskripsikan data, memetakan similaritas data dan 
                mengembangkan hipotesis dan model, dengan perpaduan multidisiplin data inferensi, pengembangan
                algoritma dan teknologi dari ilmu komputer, kecerdasan buatan dan statistik, untuk memecahkan
                masalah yang kompleks secara analitis, menyajikan polanya dalam bentuk visualisasi dan menghasilkan
                solusi kecerdasan bisnis.',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'profillulusan' => "Data Analyst",
                'deskripsi' => 'Data Analyst mengumpulkan data dari berbagai sumber data, mengatur data secara efektif untuk
                memahami pola dan hubungan data, mengubah data menjadi bentuk yang efektif untuk menganalisis
                dan menginterpretasikan data, manajemen dan analisis data dari berbagai sumber data, melihat
                keterhubungan data dalam kumpulan data dan menganalisis tren, dengan pendekatan ilmu komputer, 
                statistik dan matematika, dan memvisualisasikan hasil analisis data, untuk mengungkap pengetahuan, 
                dan pola tersembunyi dari data, yang menjadi nilai tambah bagi industri/perusahaan.',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'profillulusan' => "Data Engineer",
                'deskripsi' => 'Data Engineer mampu mengembangkan, membangun, menguji dan memelihara arsitektur untuk basis 
                data dan sistem pemrosesan skala besar, menyiapkan infrastruktur big data, mengintegrasikan data 
                dalam infrastruktur, mengelola workflow, pipeline, dan proses ETL, mengubah data menjadi format yang 
                berguna untuk analisis, dan mengelola infrastruktur untuk memastikannya mudah diakses dan berfungsi
                dengan lancar, dan mengoptimalkan kinerja big data ecosystem.',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
         ]);
    }
}
