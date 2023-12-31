@extends('templates.main')

@section('content')
    <div class="lector-info__header">Информация о лекторе</div>
    <div class="lector-info__content">
        <div class="lector-info__name">{{ $lector->name }}</div>
        <div class="lector-info__theme">
            <div class="lector-info__theme-text">Специализация лектора:</div>
            <div class="lector-info__theme-value">{{ $lector->theme->name }}</div>
        </div>
        <div class="lector-info__email">
            <div class="lector-info__email-text">Электронная почта:</div>
            <div class="lector-info__email-value">{{ $lector->email }}</div>
        </div>
        <div class="lector-info__description">
            <div class="lector-info__description-text">Описание:</div>
            <div class="lector-info__description-value">{{ $lector->description }}</div>
        </div>
        <div class="lector-info__meetings">
            <div class="lector-info__meetings-text">Проведено конференций:</div>
            <div class="lector-info__meetings-value">{{ $lector->meetings->count() }}</div>
        </div>
    </div>
@endsection
