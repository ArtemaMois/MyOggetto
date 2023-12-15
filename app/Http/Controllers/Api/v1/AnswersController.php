<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Http\Requests\Answer\CreateAnswerRequest;

class AnswersController extends Controller
{
    public function create(CreateAnswerRequest $request)
    {
        Answer::query()->create($request->validated());
        return responseOk();
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return responseOk();
    }
}
