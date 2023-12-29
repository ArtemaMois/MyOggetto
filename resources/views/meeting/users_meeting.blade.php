@extends('templates.main')

@section('content')
    <div class="meetings__header">Ваши конференции</div>
    <div class="meetings__container">
        @if ($meetings->isEmpty())
            <div class="meetings__message">У вас не назначено ни одной конференции</div>
        @else
            @foreach ($meetings as $meeting)
                @include('meeting.meeting', ['meeting' => $meeting])
            @endforeach
        @endif
    </div>
@endsection
