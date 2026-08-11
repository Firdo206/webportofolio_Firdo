<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $skills = [
            ['name' => 'Laravel', 'category' => 'Backend', 'order' => 1],
            ['name' => 'MySQL', 'category' => 'Database', 'order' => 2],
            ['name' => 'Flutter', 'category' => 'Mobile', 'order' => 3],
            ['name' => 'PHP', 'category' => 'Backend', 'order' => 4],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'order' => 5],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'order' => 6],
            ['name' => 'Git & GitHub', 'category' => 'Tools', 'order' => 7],
            ['name' => 'Figma', 'category' => 'Design', 'order' => 8],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}