<a href="" class="lector__card">
    <div class="lector__body">
        <div class="lector__name">{{ $lector->name }}</div>
        <div class="lector__theme">
            <div class="lector__text">Специалист по теме:</div>{{ $lector->theme->name }}
        </div>
        <div class="lector__email"><div class="lector__text">Электронная почта:</div>{{ $lector->email }}</div>
        <div class="lector__meetings"><div class="lector__text">Проведено конференций:</div>{{ $lector->meetings->count() }}</div>
    </div>
</a>
