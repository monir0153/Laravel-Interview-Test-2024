<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'country_id' => $this->country_id,
            'country_name' => $this->country->name,
            'name' => $this->name,
            'description' => $this->description,
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
