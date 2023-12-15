<?php

namespace App\Http\Resources\Quiz;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedQuizResource extends JsonResource
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
            'body' => $this->body,
            'createdAt' => Carbon::parse($this->created_at)->format('d:m:Y H:i')
        ];
    }
}
