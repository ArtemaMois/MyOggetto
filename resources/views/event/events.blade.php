@extends('templates.main')

@section('content')
    <div class="events__header">События</div>
    <div class="events__container">
        @foreach ($events as $event)
            @include('event.event')
        @endforeach
    </div>
@endsection
