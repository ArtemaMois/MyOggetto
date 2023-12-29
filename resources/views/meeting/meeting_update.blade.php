@extends('templates.main')

@section('content')
    <div class="meeting-update__header">
        <div class="meeting-update__header-text">Редактирование конференции</div>
        <form action="{{ route('meeting.destroy', ['meeting' => $meeting]) }}" method="post" class="meeting-update__delete">
            @method('DELETE')
            @csrf
        <button type="submit" class="meeting-update__delete-btn">Удалить</button>
    </form>
    </div>
    <form action="{{ route('meeting.update', ['meeting' => $meeting]) }}" method="POST" class="meeting-update__form"
        enctype="multipart/form-data" id="{{ $meeting->id }}">
        @csrf
        @method('patch')
        <div class="meeting-update__title">
            <label class="meeting-update__titlelable" for="meeting-update__titleinp">Название</label>
            <input type="text" name="title" class="meeting-update__titleinp" value="{{ $meeting->title }}">
            <div class="meeting-update__error">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-update__description-container">
            <label for="meeting-update__descriptioninp" class="meeting-update__descriptionlabel">Описание</label>
            <textarea name="description" class="meeting-update__descriptioninp" cols="30" rows="10"
                placeholder="Описание">{{ $meeting->description }}</textarea>
            <div class="meeting-update__error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-update__theme-container">
            <div class="meeting-update__theme">
                <label class="meeting-update__themelabel" for="meeting-update__themeinp">Тема:</label>
                <select name="theme_id" id="" class="meeting-update__themeinp">
                    <option value="{{ $meeting->theme->id }}">{{ $meeting->theme->name }}</option>
                    @foreach ($themes as $theme)
                        @if ($theme !== $meeting->theme->id)
                            <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="meeting-update__error">
                @error('theme')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-update__date-container">
            <div class="meeting-update__date">
                <label class="meeting-update__datelabel" for="meeting-update__dateinp">Дата проведения:</label>
                <input type="datetime-local" name="date" class="meeting-update__dateinp" value="{{ $meeting->date }}">
            </div>
            <div class="meeting-update__error">
                @error('date')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="meeting-update__materials-container">
            <div class="meeting-update__materials">
                <div class="meeting-update__materialstext">Материалы к конференции:</div>
                <input type="file" name="uploads[]" class="meeting-update__uploadsinp" id="file" multiple>
                <label for="file" class="meeting-update__uploadslabel">Добавить файлы</label>
                <div class="meeting-update__btn">
                    <button type="submit" class="meeting-update__button">Сохранить</button>
                </div>
            </div>
            <div class="meeting-update__error">
                @error('uploads')
                    {{ $message }}
                @enderror
                @error('uploads.*')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </form>
    <div class="meeting-update__files">
        <div class="meeting-update__files-header">Прикрепленные файлы</div>
        @foreach ($files as $key => $value)
            <form action="{{ route('meeting.delete.file', ['meeting' => $meeting, 'filename' => $key]) }}" method="POST"
                enctype="multipart/form-data" class="meeting-update__file-form">
                @csrf
                <a href="{{ $value }}" class="meeting-update__file-ref">{{ $key }}</a>
                <button type="submit">
                    <div class="meeting-update__delete-file"></div>
                </button>
            </form>
            {{-- <a href="{{ $value }}" class="meeting-update__file-ref">{{ $key }}</a>
            <div class="meeting-update__delete-file" id="{{ $key }}"></div> --}}
        @endforeach
    </div>
    <script>
        let fileInputUpdate = document.querySelector('.meeting-update__uploadsinp');
        let fileLabelUpdate = document.querySelector('.meeting-update__uploadslabel');
        fileInputUpdate.addEventListener('change', function() {
            if (fileInputUpdate.files.length > 1) {
                fileLabelUpdate.innerHTML = fileInputUpdate.files.length + ' файлов выбрано';
            } else {
                if (fileInputUpdate.files[0].name.length > 15) {
                    fileLabelUpdate.innerHTML = fileInputUpdate.files[0].name.slice(0, 15) + '...';
                } else {
                    fileLabelUpdate.innerHTML = fileInputUpdate.files[0].name;
                }
            }
        })
        let meetingId = document.querySelector('.meeting-update__form').id;
        console.log(meetingId)
        let deleteFilesBtn = document.querySelectorAll('.meeting-update__delete-file');
        deleteFilesBtn.forEach((file) => {
            file.addEventListener('click', function() {
                console.log(10)
                let xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://myoggetto/meetings/lector/' + meetingId + '/' + file.id)
                xhr.setRequestHeader('apikey', '283ab0a132c066d7');
                xhr.onload = function() {
                    console.log(xhr.status);
                }

                xhr.send();
            })
        })
    </script>
@endsection
