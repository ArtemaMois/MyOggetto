<a
    href=" @if (auth()->user()->profile_id == 2) {{ route('lector.show', ['lector' => $lector]) }} @endif
    @if (auth()->user()->profile_id == 1) {{ route('lector.change', ['lector' => $lector]) }}" @endif
    class="lector__card">
    <div class="lector__body">
        <div class="lector__content">
            <div class="lector__name">{{ $lector->name }}</div>
            <div class="lector__theme">
                <div class="lector__text">Специалист по теме:</div>{{ $lector->theme->name }}
            </div>
            <div class="lector__email">
                <div class="lector__text">Электронная почта:</div>{{ $lector->email }}
            </div>
            <div class="lector__meetings">
                <div class="lector__text">Проведено конференций:</div>{{ $lector->meetings->count() }}
            </div>
        </div>
        @if (auth()->user()->profile_id == 1)
            <form action="{{ route('lector.delete', ['lector' => $lector]) }}" method="POST" class="lector__delete">
                @method('DELETE')
                @csrf
                <button type="submit" class="lector__delete-btn">Удалить</button>
            </form>
        @endif
    </div>
</a>
