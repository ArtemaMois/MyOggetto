<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Http\Requests\Answer\CreateAnswerRequest;
use App\Models\Quiz;

class AnswersController extends Controller
{
    public function create(CreateAnswerRequest $request, Quiz $quiz)
    {
        $data['body'] = $request->body;
        $data['quiz_id'] = $quiz->id;
        $data['user_id'] = auth()->user()->id;
        Answer::query()->create($data);
        return redirect()->back();
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return 'ok';
    }
}
