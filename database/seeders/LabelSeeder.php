<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $labels = [
            ['name' => 'Personal', 'color' => '#3498db'],
            ['name' => 'Work', 'color' => '#2ecc71'],
            ['name' => 'Home', 'color' => '#e74c3c'],
            ['name' => 'Errands', 'color' => '#f39c12'],
            ['name' => 'Meetings', 'color' => '#9b59b6'],
            ['name' => 'Important', 'color' => '#e67e22'],
            ['name' => 'Development', 'color' => '#27ae60'],
            ['name' => 'Design', 'color' => '#e74c3c'],
            ['name' => 'Bug Fixing', 'color' => '#c0392b'],
            ['name' => 'Research', 'color' => '#3498db'],
            ['name' => 'Documentation', 'color' => '#f1c40f'],
            ['name' => 'Testing', 'color' => '#16a085'],
        ];

        foreach ($labels as $label) {
            Label::create($label);
        }
    }
}
