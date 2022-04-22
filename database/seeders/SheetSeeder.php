<?php

namespace Database\Seeders;

use App\Models\Sheet;
use App\Models\SheetLevels;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sheet::make([
            'title' => 'Emagrecimento',
            'instructions' => '5 minutos pra aquecer na esteira',
            'sheet_level_id' => SheetLevels::where('name', 'Iniciante')->first()->id,
            'place' => 'Academia',
        ])->save();

        Sheet::make([
            'title' => 'Emagrecimento',
            'instructions' => '',
            'sheet_level_id' => SheetLevels::where('name', 'Iniciante')->first()->id,
            'place' => 'Casa',
        ])->save();
    }
}
