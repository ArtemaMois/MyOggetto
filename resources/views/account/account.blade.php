@extends('templates.main')


@section('content')
    <div class="account">
        <div class="account__header">Аккаунт</div>
        <form action="{{ route('update', ['user' => auth()->user()]) }}" method="POST" class="account__form">
            @method('PATCH')
            @csrf
            <div class="account__name">
                <label for="account__name-inp" class="account__name-label">Имя</label>
                <input type="text" name="name" class="account__name-inp @error('name') is_invalid @enderror "
                    value="{{ auth()->user()->name }}">
                @error('name')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="account__email">
                <label for="account__email-inp" class="account__email-label">Email</label>
                <input type="email" name="email" class="account__email-inp @error('email') is_invalid @enderror"
                    value="{{ auth()->user()->email }}">
                @error('email')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="account__button">
                <button type="submit" class="account__update-btn">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
