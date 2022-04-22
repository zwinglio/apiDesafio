<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exercise::make([
            'serie_id' => '1',
            'title' => 'Cadeira extensora',
            'instructions' => '2 pernas',
            'repetitions' => '',
        ])->save();

        Exercise::make([
            'serie_id' => '1',
            'title' => 'Prancha com barriga pra baixo',
            'instructions' => 'do lado da máquina',
            'repetitions' => 'de 20 a 40 segundos',
        ])->save();

        Exercise::make([
            'serie_id' => '2',
            'title' => 'Mesa ou cadeira flexora',
            'instructions' => '',
            'repetitions' => '15',
        ])->save();

        Exercise::make([
            'serie_id' => '2',
            'title' => 'Flexão de braço iniciante',
            'instructions' => '',
            'repetitions' => '12',
        ])->save();

        Exercise::make([
            'serie_id' => '3',
            'title' => 'Leg press reto',
            'instructions' => '',
            'repetitions' => '15',
        ])->save();

        Exercise::make([
            'serie_id' => '3',
            'title' => 'Biceps com desenvolvimento',
            'instructions' => '',
            'repetitions' => '10',
        ])->save();

        Exercise::make([
            'serie_id' => '4',
            'title' => 'Triceps cabo',
            'instructions' => '',
            'repetitions' => '15',
        ])->save();

        Exercise::make([
            'serie_id' => '4',
            'title' => 'Abdominal curto',
            'instructions' => '',
            'repetitions' => '20',
        ])->save();
    }
}
