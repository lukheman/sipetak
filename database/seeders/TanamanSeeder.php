<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Tanaman::factory()->createMany([
            ['nama_tanaman' => 'Padi'],
            ['nama_tanaman' => 'Jagung'],
            ['nama_tanaman' => 'Kedelai'],
            ['nama_tanaman' => 'Kacang Tanah'],
            ['nama_tanaman' => 'Kacang Hijau'],
            ['nama_tanaman' => 'Ubi Kayu (Singkong)'],
            ['nama_tanaman' => 'Ubi Jalar'],
            ['nama_tanaman' => 'Kentang'],
            ['nama_tanaman' => 'Talas'],
            ['nama_tanaman' => 'Gandum'],
            ['nama_tanaman' => 'Kapas'],
            ['nama_tanaman' => 'Tembakau'],
            ['nama_tanaman' => 'Kakao'],
            ['nama_tanaman' => 'Kopi'],
            ['nama_tanaman' => 'Teh'],
            ['nama_tanaman' => 'Kelapa'],
            ['nama_tanaman' => 'Sawit (Kelapa Sawit)'],
            ['nama_tanaman' => 'Karet (Getah)'],
            ['nama_tanaman' => 'Cengkeh'],
            ['nama_tanaman' => 'Pala'],
            ['nama_tanaman' => 'Vanili'],
            ['nama_tanaman' => 'Lada (Merica)'],
            ['nama_tanaman' => 'Jahe'],
            ['nama_tanaman' => 'Kunyit'],
            ['nama_tanaman' => 'Cabe (Cabai)'],
        ]);
    }
}
