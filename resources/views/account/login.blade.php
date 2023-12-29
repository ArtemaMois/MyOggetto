@extends('templates.main')

@section('content')
    <h1 class="login-header">Вход</h1>
        @error('error')
            <div class="login__error">
                {{ $message }}
            </div>
        @enderror
        <form action="{{ route('login') }}" method="post" class="login-form">
            @csrf
            <div class="login-form__container">
                <div class="login-form__email">
                    <label for="login-form__emailinp" class="login-form__email-label">Email</label>
                    <input type="email" name="email" class="login-form__emailinp @error('email') is_invalid @enderror">
                    <div class="invalid-message">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="login-form__password">
                    <label for="login-form__passwordinp" class="login-form__password-label">Пароль</label>
                    <input type="password" name="password"
                        class="login-form__passwordinp @error('password') is_invalid @enderror">
                    <div class="invalid-message">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="login-form__submit">
                    <button type="submit" class="login-form__button">Войти</button>
                </div>
            </div>
        </form>
    @endsection
