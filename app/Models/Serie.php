<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = 'series';

    protected $fillable = [
        'title',
        'sheet_id',
        'instructions',
        'repetitions',
    ];

    public function sheet()
    {
        return $this->belongsTo(Sheet::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }
}
