<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ExerciseCollection extends ResourceCollection
{
    public static $wrap = 'exercises';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ExerciseResource::collection($this->collection);
    }
}
