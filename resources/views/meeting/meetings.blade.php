@extends('templates.main')

@section('content')
    <div class="meetings__container">
        @foreach ($meetings as $meeting)
            @include('meeting.meeting', ['meeting' => $meeting])
        @endforeach
    </div>
@endsection
