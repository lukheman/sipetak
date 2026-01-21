<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\KepalaDinas;
use App\Models\Petani;
use App\Models\Penyuluh;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        Admin::query()->create([
            'nama_admin' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        // Kepala Dinas
        KepalaDinas::query()->create([
            'nama_kepala_dinas' => 'Kepala Dinas',
            'email' => 'kepaladinas@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101',
            'tanggal_lahir' => '1980-01-01',
        ]);

        // Penyuluh
        Penyuluh::query()->create([
            'nama' => 'Penyuluh',
            'email' => 'penyuluh@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101001',
            'id_desa' => 1,
        ]);

        // Petani 1
        Petani::query()->create([
            'nama' => 'Petani 1',
            'email' => 'petani1@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '10010101001',
            'id_desa' => 1,
        ]);

        // Petani 2
        Petani::query()->create([
            'nama' => 'Petani 2',
            'email' => 'petani2@gmail.com',
            'password' => bcrypt('password123'),
            'telepon' => '08100101001',
            'id_desa' => 1,
        ]);
    }
}
