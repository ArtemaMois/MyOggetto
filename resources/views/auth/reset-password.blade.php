@extends('templates.main')

@section('content')
<div class="reset-password__content">
    <form action="{{ route('password.update') }}" method="POST" class="reset-password__form">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" autocomplete="off">
        @error('token')
            {{ $message }}
        @enderror
        <div class="reset-password__email">
            <label class="reset-password__email-label">Email</label>
            <input type="text" name="email" class="reset-password__email-input @error('email') invalid @enderror">
            @error('email')
                {{ $message }}
            @enderror
            {{ session('status') }}
        </div>
        <div class="reset-password__password">
            <label class="reset-password__password-label">Пароль</label>
            <input type="password" name="password" class="reset-password__password-input @error('password') invalid @enderror">
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div class="reset-password__password-confirmation">
            <label class="reset-password__password-confirmation-label">Подтверждение пароля</label>
            <input type="password" name="password_confirmation"
            class="reset-password__password-confirmation-input @error('password_confirmation') invalid @enderror">
            @error('password__confirmation')
                {{ $message }}
            @enderror
        </div>
        <div class="reset-password__submit">
            <button type="submit" class="reset-password__btn">Сохранить</button>
        </div>
    </form>
</div>
@endsection
