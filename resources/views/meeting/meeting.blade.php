<a href="{{ route('meeting.show', ['meeting' => $meeting]) }}" class="meeting__card">
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
    @if (auth()->user())
        @if (!auth()->user()->meetings->has($meeting->id))
            <div class="meeting__sign">
                <form action="{{ route('meeting.sign', ['meeting' => $meeting]) }}" method="post">
                    @csrf
                    <button type="submit" class="meeting__sign-btn">Записаться</button>
                </form>
            </div>
        @else
            <button class="meeting__signed-btn" disabled>Вы записаны</button>
        @endif
    @endif
</a>
