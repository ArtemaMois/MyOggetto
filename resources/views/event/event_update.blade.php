@extends('templates.main')

@section('content')
    <div class="event-update__header">
        <div class="event-update__header-text">Редактирование события</div>
        <form action="{{ route('event.delete', ['event' => $event]) }}" method="post" class="event-update__delete">
            @method('DELETE')
            @csrf
            <button type="submit" class="event-update__delete-btn">Удалить</button>
        </form>
    </div>
    <form action="{{ route('event.store') }}" class="event-update__form" method="POST">
        @csrf
        <div class="event-update__title-container">
            <label for="title" class="event-update__title-label">Название</label>
            <input type="text" id="title" name="title"
                class="event-update__title-input @error('title') invalid @enderror" value="{{ $event->title }}">
            <div class="event-update__error-message">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="event-update__description-container">
            <label for="description" class="event-update__description-label">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="event-update__description-input @error('description') invalid @enderror"
                placeholder="Описание">{{ $event->description }}</textarea>
            <div class="event-update__error-message">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="event-update__date-container">
            <label for="date" class="event-update__date-label">Дата проведения:</label>
            <input type="datetime-local" name="date"
                class="event-update__date-input @error('date')
                invalid @enderror" id="date" value="{{ $event->date }}">
                <div class="event-update__error-message">
                    @error('date')
                        {{ $message }}
                    @enderror
                </div>
        </div>
        <div class="event-update__submit">
            <button type="submit" class="event-update__btn">Сохранить</button>
        </div>
    </form>
@endsection
