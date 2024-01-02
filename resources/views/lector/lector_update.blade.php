@extends('templates.main')

@section('content')
    <div class="lector-update__header">
        <div class="lector-update__header-text">Редактирование информации о лекторе</div>
        <form action="{{ route('lector.delete', ['lector' => $lector]) }}" method="POST" class="lector-update__delete">
            @method('DELETE')
            @csrf
            <button type="submit" class="lector-update__delete-btn">Удалить</button>
        </form>
    </div>
    <form action="{{ route('lector.update', ['lector' => $lector]) }}" method="POST" class="lector-update__content">
        @method('PATCH')
        @csrf
        <div class="lector-update__name">
            <label class="lector-update__name-label">Имя</label>
            <input type="text" name="name" class="lector-update__name-input @error('name') invalid @enderror"
                value="{{ $lector->name }}">
            <div class="invalid-message">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="lector-update__theme">
            <label class="lector-update__theme-label">Специализация лектора:</label>
            <select name="theme_id" class="lector-update__select-theme" id="">
                @foreach ($themes as $theme)
                    <option class="lector-update__option-theme" value="{{ $theme->id }}" @if ($lector->theme == $theme)
                       selected
                    @endif>{{ $theme->name }}</option>
                @endforeach
            </select>
            <div class="invalid-message">
                @error('theme_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="lector-update__email">
            <label class="lector-update__email-label">Электронная почта:</label>
            <input type="email" name="email" class="lector-update__email-input @error('email') invalid @enderror"
                value="{{ $lector->email }}">
            <div class="invalid-message">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="lector-update__description">
            <label class="lector-update__description-label">Описание:</label>
            <textarea name="description" class="lector-update__description-text @error('description') invalid @enderror"
                placeholder="Описание">{{ $lector->description }}</textarea>
            <div class="invalid-message">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="lector-update__activity">
            <label class="lector-update__activity-label">Активность аккаунт</label>
            <select name="is_active" class="lector-update__select-activity">
                <option value="1" class="lector-update__option-activity" selected>Активен</option>
                <option value="0" class="lector-update__option-activity">Неактивен</option>
            </select>
        </div>
        <div class="invalid-message">
            @error('is_active')
                {{ $message }}
            @enderror
        </div>
        <div class="lector-update__submit">
            <button type="submit" class="lector-update__btn">Сохранить</button>
        </div>
    </form>
@endsection
