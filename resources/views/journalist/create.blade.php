@extends('layouts.app')

{{-- Если передана $news — это редактирование, иначе создание новой статьи --}}
@php $editing = isset($news); @endphp

@section('title', ($editing ? 'Редактирование' : 'Журналист') . ' — GameWave')

@section('content')
    <h1>{{ $editing ? 'Редактировать статью' : 'Написать статью' }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST"
          action="{{ $editing ? route('journalist.update', $news) : route('journalist.store') }}"
          class="article-form">
        @csrf
        @if ($editing)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title"
                   value="{{ old('title', $news->title ?? '') }}"
                   placeholder="Например: Вышло обновление к игре...">
            @error('title')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $news->category_id ?? null) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Текст статьи</label>
            <textarea id="content" name="content" rows="10"
                      placeholder="Текст новости...">{{ old('content', $news->content ?? '') }}</textarea>
            @error('content')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">
            {{ $editing ? 'Сохранить изменения' : 'Опубликовать' }}
        </button>
    </form>
@endsection
