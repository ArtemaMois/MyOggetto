<a href="{{ route('quiz.show', ['quiz' => $quiz]) }}" class="quiz__card">
    <div class="quiz__container">
        <div class="quiz__title">{{ $quiz->title }}</div>
        <div class="quiz__body">
            @if (Str::length($quiz->body) > 55)
                {{ Str::of($quiz->body)->limit(55, '...') }}
            @else
                {{ $quiz->body }}
            @endif
        </div>
        <div class="quiz__answers">
            <div class="quiz__answers-text">Ответы</div>
            <div class="quiz__answers-value">{{ $quiz->answers->count() }}</div>
        </div>
        <div class="quiz__date">
            <div class="quiz__date-value">{{ $quiz->created_at }}</div>
        </div>
    </div>
</a>
