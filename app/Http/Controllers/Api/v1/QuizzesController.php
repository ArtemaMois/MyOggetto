<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Resources\Quiz\MinifiedQuizResource;
use App\Http\Resources\Answer\MinifiedAnswerReosurce;
use App\Models\Answer;

class QuizzesController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        return view('quiz.quizzes', ['quizzes' => $quizzes]);
    }

    public function show(Quiz $quiz)
    {
        $userAnswer = Answer::query()->
        where('user_id', auth()->user()->id)->
        where('quiz_id', $quiz->id)
        ->first();
        return view('quiz.quiz_info', ['quiz' => $quiz, 'userAnswer' => $userAnswer]);
    }

    public function create()
    {
        return view('quiz.quiz_create');
    }

    public function store(CreateQuizRequest $request)
    {
        Quiz::query()->create($request->validated());
        return redirect()->back();
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return responseOk();
    }

    public function getAnswers(Quiz $quiz)
    {
        return MinifiedAnswerReosurce::collection($quiz->answers);
    }
}
