@extends('templates.main')

@section('content')
    <div class="account-verify__content">
        <div class="account-verify__message">Мы пришлем письмо для подтверждением на вашу почту. После подтверждения email,
            вы можете закрыть эту станицу.</div>
        <form action="{{ route('account.verify') }}" method="POST" class="account-verify__form">
            @csrf
            <div class="account-verify__body">
                <div class="account-verify__text">Подтвердить электронную почту</div>
                <button class="account-verify__btn">Отправить письмо</button>
            </div>
        </form>
        <div class="account-verify__status">{{ session('status') }}</div>
    </div>
@endsection
