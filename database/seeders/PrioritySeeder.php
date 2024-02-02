<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            [
                'name' => 'None',
                'color' => '#808080',
            ],
            [
                'name' => 'Low',
                'color' => '#0000FF',
            ],
            [
                'name' => 'Medium',
                'color' => '#FFA500',
            ],
            [
                'name' => 'High',
                'color' => '#FF0000',
            ],
            [
                'name' => 'Critical',
                'color' => '#8B0000',
            ]
        ];


        foreach ($priorities as $priority) {
            Priority::create($priority);
        }

    }
}
