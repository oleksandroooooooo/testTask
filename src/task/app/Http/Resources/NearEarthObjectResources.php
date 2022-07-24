<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NearEarthObjectResources extends JsonResource
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
            'reference' => $this->referenced,
            'name' => $this->name,
            'speed' => $this->speed,
            'is_hazardous' => $this->is_hazardous,
            'date' => $this->Date,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}
