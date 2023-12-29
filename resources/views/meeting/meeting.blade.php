<a @if (auth()->user()) @if (auth()->user()->profile_id === 3) href="{{ route('meeting.show', ['meeting' => $meeting]) }}"
@else
    href="{{ route('meeting.change', ['meeting' => $meeting]) }}" @endif
    @endif
    class="meeting__card">
    <div class="meeting__body">
        <div class="meeting__title">{{ $meeting->title }}</div>
        <div class="meeting__theme">
            <div class="meeting__text">Тема:</div>{{ $meeting->theme->name }}
        </div>
        <div class="meeting__lector">
            <div class="meeting__text">Лектор:</div>{{ $meeting->lector->name }}
        </div>
        <div class="meeting__description">{{ $meeting->description }}</div>
        <div class="meeting__date">
            <div class="meeting__text">Дата проведения:</div> {{ $meeting->date }}
        </div>
    </div>
    {{-- @if (auth()->user() && $meeting->active) --}}
    @if (auth()->user())
        <div class="meeting__sign">
            @if (auth()->user()->profile->id === 3)
                @if ($meeting->sign)
                    <form action="{{ route('meeting.unsubscribe', ['meeting' => $meeting]) }}" method="post">
                        @csrf
                        <button type="submit" class="meeting__unsubscribe-btn">Отписаться</button>
                    </form>
                @else
                    <form action="{{ route('meeting.sign', ['meeting' => $meeting]) }}" method="post">
                        @csrf
                        <button type="submit" class="meeting__sign-btn">Записаться</button>
                    </form>
                @endif
            @endif
            @if (auth()->user()->profile->id === 2)
                <form action="{{ route('meeting.destroy', ['meeting' => $meeting]) }}" method="POST"
                    class="meeting__form-delete">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="meeting__delete-btn">Удалить</button>
                </form>
            @endif
        </div>
    @endif
</a>
