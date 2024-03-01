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
            ['id'=> 0, 'name' => 'Unassigned', 'color' => '#FFFFFF'],  // Blue
            ['name' => 'Personal', 'color' => '#ADBCE6'],  // Blue
            ['name' => 'Work', 'color' => '#E37979'],  // Red
            ['name' => 'Study', 'color' => '#F3B3A6'],  // Orange
        ];

        foreach ($default_projects as $project) {
            Project::create($project);
        }

    }
}
