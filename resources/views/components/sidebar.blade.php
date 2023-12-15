@if (auth()->user())
    <div class="sidebar">
        <div class="sidebar__body">
            <div class="sidebar__refs">
                @if (auth()->user()->profile_id === 3)
                    <a href="{{ route('account.change', ['user' => auth()->user()]) }}">
                        <div class="sidebar__option">Аккаунт</div>
                    </a>
                    <a href="">
                        <div class="sidebar__option">Мои встречи</div>
                    </a>
                    <a href="">
                        <div class="sidebar__option">Встречи</div>
                    </a>
                    <a href="">
                        <div class="sidebar__option">Специалисты</div>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
