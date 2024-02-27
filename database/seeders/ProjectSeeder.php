<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_projects = [
            ['name' => 'Personal', 'color' => '#ADBCE6'],  // Blue
            ['name' => 'Work', 'color' => '#E37979'],  // Red
            ['name' => 'Study', 'color' => '#F3B3A6'],  // Orange
            ['name' => 'Hobbies', 'color' => '#C4E1B6'],  // Green
            ['name' => 'Health', 'color' => '#F3E1A6'],  // Yellow
            ['name' => 'Family', 'color' => '#E3A6F3'],  // Purple
        ];

        foreach ($default_projects as $project) {
            Project::create($project);
        }

    }
}
