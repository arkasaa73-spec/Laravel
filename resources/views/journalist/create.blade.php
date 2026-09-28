@extends('layouts.app')

@section('title', 'Журналист — GameWave')

@section('content')
    <h1>Написать статью</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('journalist.store') }}" class="article-form">
        @csrf

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}"
                   placeholder="Например: Вышло обновление к игре...">
            @error('title')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Категория — заглушка: всегда "Консоли", поэтому поле отключено --}}
        <div class="form-group">
            <label for="category">Категория</label>
            <select id="category" disabled>
                <option>Консоли</option>
            </select>
        </div>

        <div class="form-group">
            <label for="content">Текст статьи</label>
            <textarea id="content" name="content" rows="10"
                      placeholder="Текст новости...">{{ old('content') }}</textarea>
            @error('content')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Опубликовать</button>
    </form>
@endsection
