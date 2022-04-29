<?php

namespace App\Http\Resources;

use App\Models\Serie;
use Illuminate\Http\Resources\Json\JsonResource;

class SheetResource extends JsonResource
{
    public static $wrap = 'sheet';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'instructions' => $this->instructions,
            'place' => $this->place,
            'week' => $this->week,
            'level' => new LevelResource($this->whenLoaded('level')),
            'series' => SerieResource::collection($this->whenLoaded('series')),
            'exercises' => ExerciseResource::collection(
                Serie::where('sheet_id', $this->id)->get()->pluck('exercises')->collapse()
            ),
        ];
    }
}
