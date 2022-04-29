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
        'level_id',
        'place',
        'week'
    ];

    public function Level()
    {
        return $this->belongsTo(Level::class);
    }

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
