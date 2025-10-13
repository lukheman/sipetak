<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin

        User::query()->create([
            'nama' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '081234567890',
            'role' => Role::ADMIN,
            'id_desa' => 1,
        ]);

        // Kepala Dinas
        User::query()->create([
            'nama' => 'Kepala Dinas',
            'email' => 'kepaladinas@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101',
            'role' => Role::KEPALADINAS,
            'id_desa' => 1,
        ]);

        // Penyuluh
        User::query()->create([
            'nama' => 'Kepala Dinas',
            'email' => 'penyuluh@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101001',
            'role' => Role::PENYULUH,
            'id_desa' => 1,
        ]);

        // Petani
        User::query()->create([
            'nama' => 'Petani 1',
            'email' => 'petani1@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101001',
            'role' => Role::PETANI,
            'id_desa' => 1,
        ]);

        // Petani
        User::query()->create([
            'nama' => 'Petani 2',
            'email' => 'petani2@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '08100101001',
            'role' => Role::PETANI,
            'id_desa' => 1,
        ]);



    }
}
