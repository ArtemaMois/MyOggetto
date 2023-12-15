@extends('templates.main')

@section('content')
    <div class="meeting-info">
        <div class="meeting-info__title">{{ $meeting->title }}</div>
        <div class="meeting-info__body">
            <div class="meeting-info__video"></div>
            <div class="meeting-info__table">
                <div class="meeting-info__theme"><div class="meeting-info__text">Тема:</div>{{ $meeting->theme->name }}</div>
                <a href="#" class="meeting-info__lector"><div class="meeting-info__text">Лектор:</div>{{ $meeting->lector->name }}</a>
            </div>
        </div>
        <div class="meeting-info__description"><div class="meeting-info__text">Описание:</div>{{ $meeting->description }}</div>
        <div class="meeting-info__materials">Материалы к уроку</div>
    </div>
@endsection


