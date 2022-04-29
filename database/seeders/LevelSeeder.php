<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::make([
            'name' => 'Iniciante',
        ])->save();

        Level::make([
            'name' => 'Intermediário/Avançado',
        ])->save();
    }
}
