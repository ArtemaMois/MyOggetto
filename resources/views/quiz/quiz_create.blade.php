@extends('templates.main')

@section('content')
    <div class="quiz-create__header">Создание опроса</div>
    <form action="{{ route('quiz.store') }}" method="POST" class="quiz-create__form">
        @csrf
        <div class="quiz-create__title">
            <label class="quiz-create__title-label">Заголовок</label>
            <input type="text" name="title" class="quiz-create__title-input">
        </div>
        <div class="quiz-create__body">
            <label class="quiz-create__body-label">Вопрос</label>
            <textarea name="body" class="quiz-create__body-text" placeholder="Содержание вопроса..."></textarea>
        </div>
        <div class="quiz-create__submit">
            <button class="quiz-create__btn">Создать</button>
        </div>
    </form>
@endsection
