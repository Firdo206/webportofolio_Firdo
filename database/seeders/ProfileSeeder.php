<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'name' => 'Nama Kamu',
            'tagline' => 'Digital Creative Developer',
            'description' => 'Saya adalah mahasiswa Teknik Informatika semester 5 yang tertarik di bidang web development, mobile development, dan UI/UX design. Saya senang membangun aplikasi yang fungsional sekaligus enak dilihat.',
            'photo' => null,
            'cv_path' => null,
            'github_url' => 'https://github.com/username-kamu',
            'instagram_url' => 'https://instagram.com/username-kamu',
            'whatsapp_number' => '628xxxxxxxxxx',
            'email' => 'email-kamu@gmail.com',
        ]);
    }
}