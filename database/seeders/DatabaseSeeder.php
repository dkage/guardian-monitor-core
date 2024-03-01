<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminUserSeeder::class,
            LabelSeeder::class,
            OriginSeeder::class,
            PrioritySeeder::class,
            ProjectSeeder::class,
        ]);

    }
}
