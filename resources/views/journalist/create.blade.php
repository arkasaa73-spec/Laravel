@extends('layouts.app')

@section('title', 'Журналист — GameWave')

@section('content')
    <h1>Написать статью</h1>

    {{-- На этом этапе форма только сверстана, сохранение подключим позже --}}
    <form method="POST" action="#" class="article-form" enctype="multipart/form-data" onsubmit="event.preventDefault()">
        @csrf

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" placeholder="Например: Вышло обновление к игре...">
        </div>

        <div class="form-group">
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Обложка</label>
            <input type="file" id="image" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="content">Текст статьи</label>
            <textarea id="content" name="content" rows="10" placeholder="Текст новости..."></textarea>
        </div>

        <div class="form-group">
            <label for="published_at">Дата публикации</label>
            <input type="date" id="published_at" name="published_at">
        </div>

        <button type="submit" class="btn-submit">Опубликовать</button>
    </form>
@endsection
