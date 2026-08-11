<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        Experience::create([
            'title' => 'Magang Backend Developer',
            'place' => 'Nama Perusahaan',
            'description' => 'Mengembangkan fitur backend menggunakan Laravel, integrasi API, dan optimasi database.',
            'type' => 'magang',
            'start_date' => '2025-06-01',
            'end_date' => '2025-08-31',
        ]);

        Experience::create([
            'title' => 'Juara 2 Lomba Web Development',
            'place' => 'Nama Kompetisi/Universitas',
            'description' => 'Membuat aplikasi web dalam waktu 24 jam bersama tim, meraih juara 2 kategori mahasiswa.',
            'type' => 'lomba',
            'start_date' => '2025-03-15',
            'end_date' => '2025-03-16',
        ]);

        Experience::create([
            'title' => 'Anggota Divisi IT',
            'place' => 'Himpunan Mahasiswa TI',
            'description' => 'Mengelola website dan sistem informasi internal organisasi.',
            'type' => 'organisasi',
            'start_date' => '2024-08-01',
            'end_date' => null,
        ]);
    }
}