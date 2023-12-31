@extends('templates.main')

@section('content')
    <div class="event-info__content">
        <div class="event-info__header">{{ $event->title }}</div>
        <div class="event-info__description">{{ $event->description }}</div>
        <div class="event-info__date">
            <div class="event-info__date-text">Дата проведения:</div>
            <div class="event-info__date-value">{{ $event->date }}</div>
        </div>
    </div>
@endsection
