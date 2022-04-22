<?php

namespace App\Http\Resources;

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
            'sheet_level' => new SheetLevelsResource($this->sheetLevel),
            'place' => $this->place,
            'series' => SerieResource::collection($this->whenLoaded('series')),
        ];
    }
}
