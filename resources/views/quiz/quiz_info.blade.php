@extends('templates.main')

@section('content')
    <div class="quiz-info__container">
        <div class="quiz-info">
            <div class="quiz-info__title">{{ $quiz->title }}</div>
            <div class="quiz-info__body-value">{{ $quiz->body }}</div>
        </div>
        @if (auth()->user()->profile_id == 3)
            {{-- {{ dd($userAnswer) }} --}}
            @if (@empty($userAnswer))
                <form action="{{ route('answer.create', ['quiz' => $quiz]) }}" class="quiz-info__form" method="POST">
                    @csrf
                    <div class="quiz-info__body">
                        <label class="quiz-info__body-label">Ваш ответ</label>
                        <textarea type="text" name="body" class="quiz-info__body-input @error('body') invalid @enderror"
                            placeholder="Ваш ответ..."></textarea>
                        <div class="invalid-message">
                            @error('body')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="quiz-info__submit">
                        <button type="submit" class="quiz-info__submit-btn">Сохранить</button>
                    </div>
                </form>
            @else
                <div class="quiz-info__added-answer">Вы уже отвечали на этот вопрос</div>
            @endif
        @endif
        <div class="quiz-info__answers">
            @foreach ($quiz->answers as $answer)
                @include('answer.answer', ['answer' => $answer])
            @endforeach
        </div>
    </div>
@endsection
