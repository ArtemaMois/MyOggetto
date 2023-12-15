<?php

namespace App\Http\Resources\Comment;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedCommentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'username' => $this->user->name,
            'body' => $this->body,
            'createdAt' => Carbon::parse($this->created_at)->format('H:i')
        ];
    }
}
