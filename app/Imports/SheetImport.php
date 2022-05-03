<?php

namespace App\Imports;

use App\Models\Level;
use App\Models\Sheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SheetImport implements ToCollection, WithStartRow
{
    private $sheet;

    public function __construct()
    {
        $this->sheet = Sheet::select('title', 'week', 'level_id', 'place')->get();
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $sheet = Sheet::firstOrCreate([
                'title' => $row[0],
                'level_id' => Level::where('name', 'ilike', $row[3])->firstOrFail()->id,
                'week' => $row[4],
                'place' => $row[2],
            ], [
                'title' => $row[0],
                'instructions' => $row[1],
                'place' => $row[2],
                'level_id' => Level::where('name', 'ilike', $row[3])->firstOrFail()->id,
                'week' => $row[4],
            ]);

            $serie = $sheet->series()->firstOrCreate([
                'title' => $row[5],
                'instructions' => $row[6],
                'repetitions' => $row[7],
            ]);

            $exercise = $serie->exercises()->firstOrCreate([
                'title' => $row[8],
                'instructions' => $row[9],
                'repetitions' => $row[10],
            ], [
                'title' => $row[8],
                'instructions' => $row[9],
                'repetitions' => $row[10],
                'order' => count($serie->exercises) + 1,
            ]);
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
