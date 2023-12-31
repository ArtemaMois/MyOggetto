@if (auth()->user())
    <div class="sidebar">
        <div class="sidebar__body">
            <div class="sidebar__refs">
                @if (auth()->user()->profile_id === 3)
                    <a href="{{ route('account.change', ['user' => auth()->user()]) }}">
                        <div class="sidebar__option">Аккаунт</div>
                    </a>
                    <a href="{{ route('meeting.user') }}">
                        <div class="sidebar__option">Мои Конференции</div>
                    </a>
                    <a href="{{ route('meeting.index') }}">
                        <div class="sidebar__option">Конференции</div>
                    </a>
                    <a href="{{ route('lector.index') }}">
                        <div class="sidebar__option">Специалисты</div>
                    </a>
                @endif
                @if (auth()->user()->profile_id === 2)
                    <a href="{{ route('account.change', ['user' => auth()->user()]) }}">
                        <div class="sidebar__option">Аккаунт</div>
                    </a>
                    <a href="{{ route('meeting.create') }}">
                        <div class="sidebar__option">Создать конференцию</div>
                    </a>
                    <a href="{{ route('meeting.lector') }}">
                        <div class="sidebar__option">Редактировать конференцию</div>
                    </a>
                @endif
                @if (auth()->user()->profile_id === 1)
                    <a href="{{ route('event.index') }}">
                        <div class="sidebar__option">События</div>
                    </a>
                    <a href="{{ route('event.create') }}">
                        <div class="sidebar__option">Создать событие</div>
                    </a>
                    <a href="{{ route('account.admin.create') }}">
                        <div class="sidebar__option">Добавить пользователя</div>
                    </a>
                    <a href="{{ route('account.users') }}">
                        <div class="sidebar__option">Пользователи</div>
                    </a>
                    <a href="{{ route('lector.index') }}">
                        <div class="sidebar__option">Лекторы</div>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif
