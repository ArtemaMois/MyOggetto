<div class="navbar">
    <div class="navbar__container">
        <div class="navbar__logo">
            <div class="navbar__text">MYOggetto</div>
        </div>
        @if (!auth()->user())
            <div class="navbar__auth">
                <a href="{{ route('register') }}" class="navbar__register">
                    <div>Регистрация</div>
                </a>
                <a href="{{ route('loginForm') }}" class="navbar__signin">
                    <div>Войти</div>
                </a>
            </div>
        @else
            <form action="{{ route('logout') }}" method="post" class="navbar__logout">
                @csrf
                <button type="submit" class="navbar__logout-btn">Выйти</button>
            </form>
        @endif
    </div>
</div>
