@extends('templates.main')

@section('content')
    <div class="event-create__header">Создание события</div>
    <form action="{{ route('event.store') }}" class="event-create__form" method="POST">
        @csrf
        <div class="event-create__title-container">
            <label for="title" class="event-create__title-label">Название</label>
            <input type="text" id="title" name="title"
                class="event-create__title-input @error('title') invalid @enderror">
            <div class="event-create__error-message">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="event-create__description-container">
            <label for="description" class="event-create__description-label">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="event-create__description-input @error('description') invalid @enderror" placeholder="Описание"></textarea>
            <div class="event-create__error-message">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="event-create__date-container">
            <label for="date" class="event-create__date-label">Дата проведения:</label>
            <input type="datetime-local" name="date"
                class="event-create__date-input @error('date')
                invalid @enderror" id="date">
                <div class="event-create__error-message">
                    @error('date')
                        {{ $message }}
                    @enderror
                </div>
        </div>
        <div class="event-create__submit">
            <button type="submit" class="event-create__btn">Создать</button>
        </div>
    </form>
@endsection
