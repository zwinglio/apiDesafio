<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'published',
    ];

    public function Sheets()
    {
        return $this->hasMany(Sheet::class);
    }
}
