<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
         [
            'name' => 'Maryam',
            'email' => "maryam@gmail.com",
            'password' => "12345678"
         ],
        ]);
    }
}
