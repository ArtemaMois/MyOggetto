<div class="user__card">
    <div class="user__body">
        <div class="user__info">
            <div class="user__name">{{ $user->name }}</div>
            <div class="user__email">
                <div class="user__email-text">Элетронная почта:</div>
                <div class="user__email-value">{{ $user->email }}</div>
            </div>
            <div class="user__meetings">
                <div class="user__meetings-text">Посещено конференций:</div>
                <div class="user__meetings-value">{{ $user->meetings->count() }}</div>
            </div>
        </div>
        <form action="{{ route('account.activity', ['user' => $user]) }}" method="post" class="user__activity">
            @method('PATCH')
            @csrf
            @if ($user->is_active)
                <button type="submit" class="user__delete-btn">Удалить</button>
            @else
                <button type="submit" class="user__active-btn">Активировать</button>
            @endif
        </form>
    </div>
</div>
