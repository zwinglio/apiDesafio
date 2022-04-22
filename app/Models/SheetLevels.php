<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheetLevels extends Model
{
    use HasFactory;

    protected $table = 'sheet_levels';

    protected $fillable = [
        'name',
    ];

    public function sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
