<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Serie::make([
            'sheet_id' => '1',
            'title' => 'Série 01',
            'instructions' => 'Descanso de 40 segundos entre as séries',
            'repetitions' => '3',
        ])->save();

        Serie::make([
            'sheet_id' => '1',
            'title' => 'Série 02',
            'instructions' => 'Descanso de 40 segundos entre as séries',
            'repetitions' => '3',
        ])->save();

        Serie::make([
            'sheet_id' => '1',
            'title' => 'Série 03',
            'instructions' => 'Descanso de 40 segundos entre as séries',
            'repetitions' => '3',
        ])->save();

        Serie::make([
            'sheet_id' => '1',
            'title' => 'Série 04',
            'instructions' => 'Descanso de 40 segundos entre as séries',
            'repetitions' => '4',
        ])->save();
    }
}
