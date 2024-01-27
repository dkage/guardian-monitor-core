<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $origins = [
            'Guardian-Monitor',
            'Todoist',
            'Google Calendar'
        ];

        foreach ($origins as $origin) {
            Origin::create(['name' => $origin]);
        }
    }
}
