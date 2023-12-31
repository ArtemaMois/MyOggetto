<a href="{{ route('event.change', ['event' => $event]) }}" class="event__card">
    <div class="event__body">
        <div class="event__content">
            <div class="event__title">
                <div class="event__title-value">{{ $event->title }}</div>
            </div>
            <div class="event__description">
                <div class="event__description-text">Описание</div>
                <div class="event__description-value">
                    @if (Str::length($event->description) > 50)
                        {{ Str::of($event->description)->limit(50, '...') }}
                    @else
                        {{ $event->description }}
                    @endif
                </div>
            </div>
            <div class="event__date">
                <div class="event__date-text">Дата:</div>
                <div class="event__date-value">{{ $event->date }}</div>
            </div>
        </div>
        @if (auth()->user()->profile_id === 1)
            <div class="event__delete">
                <form action="{{ route('event.delete', ['event' => $event]) }}" class="event__delete-form" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="event__delete-btn">Удалить</button>
                </form>
            </div>
        @endif
    </div>
</a>
