@extends('templates.main')

@section('content')
    <div class="users__header">Пользователи</div>
    <div class="users__switcher">
        <div class="users__active-switch active-switch">Активные</div>
        <div class="users__unactive-switch">Неактивные</div>
    </div>
    <form action="{{ route('account.search') }}" method="POST" class="users__search">
        @csrf
        <input type="text" name="name" class="users__name-input" placeholder="Введите имя...">
        <button type="submit" class="users__search-btn"><img src="{{ asset('images/free-icon-search-4024513.png') }}" alt="поиск"></button>
    </form>
    <div class="users__container">
        <div class="users__content">
            <div class="users__active">
                @foreach ($users['active'] as $activeUser)
                    @include('account.account_user_card', ['user' => $activeUser])
                @endforeach
            </div>
            <div class="users__unactive">
                @foreach ($users['unactive'] as $unactiveUser)
                    @include('account.account_user_card', ['user' => $unactiveUser])
                @endforeach
            </div>
        </div>
    </div>
    <script>
        let switcher = document.querySelector('.users__switcher')
        switcher.addEventListener('click', function() {
            let content = document.querySelector('.users__content')
            let activeSwitch = document.querySelector('.users__active-switch');
            let unactiveSwitch = document.querySelector('.users__unactive-switch');
            let activeContainer = document.querySelector('.users__active');
            let unactiveContainer = document.querySelector('.users__unactive');
            if(activeSwitch.classList.contains('active-switch')){
                activeSwitch.classList.remove('active-switch');
                activeContainer.classList.add('unactive-content');
                unactiveContainer.classList.remove('unactive-content');
                unactiveSwitch.classList.add('active-switch');
            }
            else{
                unactiveSwitch.classList.remove('active-switch');
                activeContainer.classList.remove('unactive-content');
                unactiveContainer.classList.add('unactive-content');
                activeSwitch.classList.add('active-switch');
                content.offsetLeft = 0 + '';
            }
        });
    </script>
@endsection
