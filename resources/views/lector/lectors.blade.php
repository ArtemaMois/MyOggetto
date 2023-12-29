@extends('templates.main')

@section('content')
    <div class="lectors">
        <div class="lectors__header">Специалисты</div>
        <div class="lectors__container">
            @foreach ($lectors as $lector)
                @include('lector.lector')
            @endforeach

        </div>
    </div>
@endsection
