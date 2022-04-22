<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SheetLevelsSeeder::class);
        $this->call(SheetSeeder::class);
        $this->call(SerieSeeder::class);
        $this->call(ExerciseSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\SheetLevels::factory(10)->create();
    }
}
