<?php

namespace App\Http\Resources;

use App\Models\Exercise;
use Illuminate\Http\Resources\Json\JsonResource;

class SerieResource extends JsonResource
{
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
            'repetitions' => $this->repetitions,
            'sheet' => new SheetResource($this->whenLoaded('sheet')),
            'exercises' => ExerciseResource::collection(
                Exercise::where('serie_id', $this->id)->get()
            ),
        ];
    }
}
