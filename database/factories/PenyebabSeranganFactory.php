<?php

namespace Database\Factories;

use App\Models\PenyebabSerangan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenyebabSerangan>
 */
class PenyebabSeranganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'tipe' => $this->faker->randomElement([PenyebabSerangan::TIPE_HAMA, PenyebabSerangan::TIPE_PENYAKIT]),
            'deskripsi' => $this->faker->text()
        ];
    }
}

