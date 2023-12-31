@extends('templates.main')

@section('content')
    <div class="admin-create__header">Создание пользователя</div>
    <form action="{{ route('account.admin.store') }}" method="post" class="admin-create__form">
        @csrf
        <div class="admin-create__container">
            <div class="admin-create__name">
                <label class="admin-create__name-label">Имя</label>
                <input type="text" name="name" class="admin-create__nameinp @error('name') is_invalid @enderror">
                <div class="invalid-message">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__email">
                <label for="admin-create__emailinp" class="admin-create__email-label">Email</label>
                <input type="email" name="email" class="admin-create__emailinp @error('email') is_invalid @enderror">
                <div class="invalid-message">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__password">
                <label for="admin-create__passwordinp" class="admin-create__password-label">Пароль</label>
                <input type="password" name="password"
                    class="admin-create__passwordinp @error('password') is_invalid @enderror">
                @error('password')
                    <div class="invalid-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="admin-create__profile">
                <div class="admin-create__profile-text">Тип аккаунта:</div>
                <select name="profile_id" class="admin-create__select-profile">
                    @foreach ($profiles as $profile)
                        <option class="admin-create__option-profile" value="{{ $profile->id }}">{{ $profile->name }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-message">
                    @error('profile_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__lector-theme unactive">
                <div class="admin-create__theme-text">Выберите направление лектора:</div>
                <select class="admin-create__select-theme" name="theme_id">
                    <option value="" selected>Выберите тему</option>
                    @foreach ($themes as $theme)
                        <option class="admin-create__option-theme" value="{{ $theme->id }}">{{ $theme->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-message">
                    @error('theme_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__lector-description unactive">
                <div class="admin-create__description-title">Описание лектора:</div>
                <textarea name="description" cols="30" rows="10" placeholder="Описание лектора"
                    class="admin-create__description-text"></textarea>
                <div class="invalid-message">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__active">
                <div class="admin-create__active-text">Активация аккаунта:</div>
                <select name="is_active" class="admin-create__select-active">
                    <option class="admin-create__option-activity" value="1" selected>Активен</option>
                    <option class="admin-create__option-activity" value="0">Не активен</option>
                </select>
                <div class="invalid-message">
                    @error('is_active')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="admin-create__submit">
                <button type="submit" class="admin-create__button">Создать</button>
            </div>
        </div>
    </form>
    <script>
        let sel = document.querySelector('.admin-create__select-profile');
        let value = sel.value;
        if (value == 2) {
            document.querySelector('.admin-create__lector-theme').classList.remove("unactive");
            document.querySelector('.admin-create__lector-description').classList.remove("unactive");
        }
        sel.addEventListener('change', function() {
            let val = sel.value;
            let theme = document.querySelector('.admin-create__lector-theme');
            let description = document.querySelector('.admin-create__lector-description');
            if (val == 2) {
                theme.classList.remove("unactive");
                description.classList.remove("unactive");
            } else {
                if (!theme.classList.contains("unactive") && !description.classList.contains("unactive")) {
                    theme.classList.add("unactive");
                    description.classList.add("unactive");
                }
            }
            console.log(val);
        });
    </script>
@endsection
