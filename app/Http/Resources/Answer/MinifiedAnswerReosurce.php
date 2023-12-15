<?php

namespace App\Http\Resources\Answer;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedAnswerReosurce extends JsonResource
{

    public function toArray($request)
    {
        return [
            'username' => $this->user->name,
            'body' => $this->body,
            'createdAt' => Carbon::parse($this->created_at)->format('d:m:Y H:i')
        ];
    }
}
