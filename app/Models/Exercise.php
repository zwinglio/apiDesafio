<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $table = 'exercises';

    protected $fillable = [
        'serie_id',
        'title',
        'instructions',
        'repetitions',
        'order'
    ];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
