<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Website Portofolio Pribadi',
            'description' => 'Website portofolio dibangun menggunakan Laravel dengan fitur CRUD untuk mengelola konten secara mandiri.',
            'tech_stack' => 'Laravel, MySQL, Tailwind CSS',
            'image' => null,
            'demo_url' => null,
            'github_url' => 'https://github.com/username-kamu/portfolio',
            'order' => 1,
        ]);

        Project::create([
            'title' => 'Aplikasi Mobile Contoh',
            'description' => 'Aplikasi mobile untuk manajemen tugas kuliah dengan fitur reminder dan sinkronisasi cloud.',
            'tech_stack' => 'Flutter, Firebase',
            'image' => null,
            'demo_url' => null,
            'github_url' => 'https://github.com/username-kamu/tugas-app',
            'order' => 2,
        ]);
    }
}