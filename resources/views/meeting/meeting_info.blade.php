@extends('templates.main')

@section('content')
    <div class="meeting-info">
        <div class="meeting-info__title">{{ $meeting->title }}</div>
        <div class="meeting-info__body">
            <div class="meeting-info__video"></div>
            <div class="meeting-info__table">
                <div class="meeting-info__theme">
                    <div class="meeting-info__text">Тема:</div>{{ $meeting->theme->name }}
                </div>
                <a href="#" class="meeting-info__lector">
                    <div class="meeting-info__text">Лектор:</div>{{ $meeting->lector->name }}
                </a>
                <div class="meeting-info__materials">Материалы к уроку</div>
            </div>
        </div>
        <div class="meeting-info__description">
            <div class="meeting-info__text">Описание:</div>{{ $meeting->description }}
        </div>
        <div class="meeting-info__comments">
            <div class="meeting-info__subheader">Комментарии</div>
            <form action="{{ route('comment.create', ['meeting' => $meeting]) }}" method="POST" class="meeting-info__form">
                @csrf
                <div class="meeting-info__comment-body">
                    <textarea name="body" cols="120" rows="5" class="meeting-info__textarea" placeholder="Текст комментария..."></textarea>
                    <button type="submit" class="meeting-info__btn">Отправить</button>
                </div>
            </form>
            <div class="meeting-info__list">
                @foreach ($meeting->comments()->orderBy('created_at', 'desc')->get() as $comment)
                    @include('comments.comment', ['comment' => $comment])
                @endforeach
            </div>
        </div>
    </div>
@endsection
