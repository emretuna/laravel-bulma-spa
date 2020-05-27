<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Treatment extends JsonResource
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
            'name' => $this->name,
            'icon' => $this->icon,
            'desc' => $this->desc,
            'duration' => $this->duration,
            'procedure' => $this->procedure,
            'accommodation' => $this->accommodation,
            'transport' => $this->transport,
            'extra' => $this->extra,
            'assistance' => $this->assistance,
            'guidance' => $this->guidance,
            'doctors' => $this->doctors,
        ];
    }
}
