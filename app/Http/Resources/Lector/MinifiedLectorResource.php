<?php

namespace App\Http\Resources\Lector;

use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedLectorResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'theme' => $this->theme->name,
            'email' => $this->email
        ];
    }
}
