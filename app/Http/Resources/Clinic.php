<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Clinic extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner_id' => $this->owner_id,
            'status' => $this->status,
            'name' => $this->name,
            'address' => $this->address,
            'about' => $this->about,
            'languages' => $this->languages,
            'location' => $this->location,
            'country' => $this->country,
        ];
    }
}
