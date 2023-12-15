<?php

namespace App\Http\Resources\Event;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedEventResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date
        ];
    }
}
