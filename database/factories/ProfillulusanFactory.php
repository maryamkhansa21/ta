<?php

namespace Database\Factories;

use App\Models\Profillulusan;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfillulusanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profillulusan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profillulusan' => $this->faker->profillulusan,
            'deskripsi' => $this->faker->deskripsi,
        ];
    }
}
