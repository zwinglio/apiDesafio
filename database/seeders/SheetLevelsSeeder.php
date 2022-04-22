<?php

namespace Database\Seeders;

use App\Models\SheetLevels;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SheetLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SheetLevels::make([
            'name' => 'Iniciante',
        ])->save();

        SheetLevels::make([
            'name' => 'Intermediário',
        ])->save();
        
        SheetLevels::make([
            'name' => 'Avançado',
        ])->save();
    }
}
