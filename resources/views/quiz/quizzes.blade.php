@extends('templates.main')

@section('content')
<div class="quizzes__header">Опросы</div>
<div class="quizzes__content">
    @foreach ($quizzes as $quiz)
        @include('quiz.quiz', ['quiz' => $quiz])
    @endforeach
</div>
@endsection
