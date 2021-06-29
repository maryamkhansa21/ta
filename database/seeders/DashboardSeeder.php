<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Dashboard::insert([
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu menerapkan pemikian logis, kritis, inovatif, bermutu, 
                dan terukur dalam melakukan pekerjaan yang spesifik di 
                bidang keahliannya serta sesuai dengan standar kompetensi
                kerja bidang yang bersangkutan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu menunjukkan kinerja mandiri, bermutu dan terukur',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu mengkaji kasus penerapan ilmu pengetahuan dan 
                teknologi yang memperhatikan dan menerapkan nilai
                humaniora sesuai dengan bidang keahliannya dalam rangka
                menghasilkan prototype, prosedur baku, desain atau karya
                seni, menyusun hasil kajiannya dalam bentuk kertas kerja,
                spesifikasi desain, atau esai seni, dan mengunggahnya dalam
                laman perguruan tinggi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu menyusun hasil kajian tersebut di atas dalam bentuk
                kertas kerja, spesifikasi desain, atau esai seni, dan 
                mengunggahnya dalam laman perguruan tinggi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu mengambil keputusan secara tepat berdasarkan
                prosedur baku, spesifikasi desain, persyaratan keselamatan
                dan keamanan kerja dalam melakukan supervisi dan evaluasi
                pada pekerjaannya',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu memelihara dan mengembangkan jaringan kerja sama dan hasil kerja sama di dalam maupun di luar lembaganya',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu bertanggungjawab atas pencapaian hasil kerja 
                kelompok dan melakukan supervisi dan evaluasi terhadap 
                penyelesaian pekerjaan yang ditugaskan kepada pekerja yang 
                berada di bawah tanggungjawabnya',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu melakukan proses evaluasi diri terhadap kelompok 
                kerja yang berada dibawah tanggung jawabnya, dan mampu 
                mengelola pembelajaran secara mandiri',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'programstudi' => 'IT',
                'jenjang' => "Sarjana Terapan",
                'kudikti' => 'mampu mendokumentasikan, menyimpan, mengamankan, dan 
                menemukan kembali data untuk menjamin kesahihan dan
                mencegah plagiasi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ]);
    }
}
