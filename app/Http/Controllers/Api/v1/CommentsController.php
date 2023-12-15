<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Meeting;
use App\Http\Requests\Comment\CreateCommentRequest;

class CommentsController extends Controller
{
    public function create(CreateCommentRequest $request, Meeting $meeting)
    {
        $data = $request->validated();
        $data['meeting_id'] = $meeting->id;
        $data['user_id'] = auth()->user()->id;
        Comment::query()->create($data);
        return responseOk();
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return responseOk();
    }
}
