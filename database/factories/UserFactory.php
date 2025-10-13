<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => static::$password ?: (static::$password = bcrypt('password123')),
            'telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'role' => $this->faker->randomElement(Role::values()),
            'id_desa' => \App\Models\Desa::factory(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
