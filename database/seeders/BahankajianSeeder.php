<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BahankajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bahankajian::insert([
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Akidah',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Analisis Keuangan',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Analisis Solusi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Business Feasibility Study',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Dasar Negara',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Demokrasi Pancasila',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'English Communication',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'English Conversation',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'English Listening',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'English Writing',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Etika',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Etika Diskusi',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Experimental Analysis',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'rumpunkeilmuan' => "Rumpun Keilmuan Kajian Umum",
                'bahankajian' => 'Fiqih',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ]);
    }
}
