<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\Quiz\CreateQuizRequest;
use App\Http\Resources\Quiz\MinifiedQuizResource;
use App\Http\Resources\Answer\MinifiedAnswerReosurce;

class QuizzesController extends Controller
{
    public function index()
    {
        return MinifiedQuizResource::collection(Quiz::all());
    }

    public function create(CreateQuizRequest $request)
    {
        Quiz::query()->create($request->validated());
        return responseOk();
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
