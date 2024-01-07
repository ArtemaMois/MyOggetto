@extends('templates.main')

@section('content')

    <div class="forgot-password__content">
        <div class="forgot-password__header">Сброс пароля</div>
        <form method="POST" action="{{ route('password.email') }}" class="forgot-password__form">
            @csrf
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="invalid-message">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <label class="forgot-password__email-label">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="forgot-password__email-input @error('email') invalid @enderror">
            <div class="forgot-password__submit">
                <button type="submit" class="forgot-password__btn">
                    Отправить инструкции по<br>
                восстановлению пароля на почту
                </button>
            </div>
        </form>
    </div>
@endsection
