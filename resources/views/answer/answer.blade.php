<div class="answer__card">
    <div class="answer__container">
        <div class="answer__user">{{ $answer->user->name }}</div>
        <div class="answer__body">
            @if (Str::length($answer) > 50)
                {{ Str::of($answer->body)->limit(50, '...') }}
            @else
                {{ $answer->body }}
            @endif
        </div>
        <div class="answer__date">
            <div class="answer__date-value">{{ $answer->created_at }}</div>
        </div>
    </div>
</div>
