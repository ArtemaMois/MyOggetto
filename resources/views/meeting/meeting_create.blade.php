@extends('templates.main')

@section('content')
    <div class="meeting-create__header">Новая конференция</div>
    <form action="{{ route('meeting.store') }}" method="POST" class="meeting-create__form" enctype="multipart/form-data">
        @csrf
        <div class="meeting-create__title">
            <label class="meeting-create__titlelable" for="meeting-create__titleinp">Название</label>
            <input type="text" name="title" class="meeting-create__titleinp">
            <div class="meeting-create__error">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-create__description-container">
            <label for="meeting-create__descriptioninp" class="meeting-create__descriptionlabel">Описание</label>
            <textarea name="description" class="meeting-create__descriptioninp" cols="30" rows="10" placeholder="Описание"></textarea>
            <div class="meeting-create__error">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-create__theme-container">
            <div class="meeting-create__theme">
                <label class="meeting-create__themelabel" for="meeting-create__themeinp">Тема:</label>
                <select name="theme_id" id="" class="meeting-create__themeinp">
                    <option value="">Выберите тему</option>
                    @foreach ($themes as $theme)
                        <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="meeting-create__error">
                @error('theme')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-create__date-container">
            <div class="meeting-create__date">
                <label class="meeting-create__datelabel" for="meeting-create__dateinp">Дата проведения:</label>
                <input type="datetime-local" name="date" class="meeting-create__dateinp">
            </div>
            <div class="meeting-create__error">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-create__materials-container">
            <div class="meeting-create__materials">
                <div class="meeting-create__materialstext">Материалы к конференции:</div>
                <input type="file" name="uploads[]" class="meeting-create__uploadsinp" id="file" data-multimple-caption="{count} файлов выбрано" multiple>
                <label for="file" class="meeting-create__uploadslabel">Добавить файлы</label>
            </div>
            <div class="meeting-create__error">
                @error('uploads')
                    {{ $message }}
                @enderror
                @error('uploads.*')
                {{ $message }}
            @enderror
            </div>
        </div>
        <div class="meeting-create__btn">
            <button type="submit" class="meeting-create__button">Создать</button>
        </div>
    </form>
@endsection
