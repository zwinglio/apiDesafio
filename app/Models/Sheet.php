<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    use HasFactory;

    protected $table = 'sheets';

    protected $fillable = [
        'title',
        'instructions',
        'sheet_level_id',
        'place',
    ];

    public function sheetLevel()
    {
        return $this->belongsTo(SheetLevels::class);
    }

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
