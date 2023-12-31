@extends('templates.main')

@section('content')
    <div class="lector-update__header">
        <div class="lector-update__header-text">Редактирование информации о лекторе</div>
        <form action="" method="POST" class="lector-update__delete">
            @method('DELETE')
            @csrf
            <button type="submit" class="lector-update__delete-btn">Удалить</button>
        </form>
    </div>
    <form action="" method="POST" class="lector-update__content">
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
            <label class="lector-update__theme-text">Специализация лектора:</label>
            <select name="theme_id" class="lector-update__select-theme" id="">
                <option value="" selected>Выберите тему</option>
                @foreach ($themes as $theme)
                    <option class="lector-update__option-theme" value="{{ $theme->id }}">$theme->name</option>
                @endforeach
            </select>
            <div class="invalid-message">
                @error('theme_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="lector-update__email">
            <label class="lector-update__email-text">Электронная почта:</label>
            <input type="email" name="email" class="lector-update__email-value @error('email') invalid @enderror"
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
        <button type="submit" class="lector-update__btn">Сохранить</button>
    </form>
@endsection
