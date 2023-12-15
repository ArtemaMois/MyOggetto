<?php

namespace App\Http\Resources\Meeting;

use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedMeetingResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'theme' => $this->theme->name,
            'lector' => $this->lector->name
        ];
    }
}
