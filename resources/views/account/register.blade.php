@extends('templates.main')

@section('content')
<div class="register__header">Регистрация</div>
    <form action="{{ route('store') }}" method="post" class="register-form">
        @csrf
        <div class="register-form__container">
            <div class="register-form__name">
                <label for="register-form__nameinp" class="register-form__name-label">Имя</label>
                <input type="text" name="name" class="register-form__nameinp @error('name') is_invalid @enderror"
                    required>
                @error('name')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="register-form__email">
                <label for="register-form__emailinp" class="register-form__email-label">Email</label>
                <input type="email" name="email" class="register-form__emailinp @error('email') is_invalid @enderror"
                    required>
                @error('email')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="register-form__password">
                <label for="register-form__passwordinp" class="register-form__password-label">Пароль</label>
                <input type="password" name="password"
                    class="register-form__passwordinp @error('password') is_invalid @enderror" required>
            </div>
            <div class="register-form__submit">
                <button type="submit" class="register-form__button">Отправить</button>
                @error('password')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </form>
@endsection
