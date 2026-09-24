@extends('layouts.app')

@section('title', 'GameWave — Главная')

@section('content')
    <h1>Все новости</h1>

    @forelse ($news as $item)
        <article class="news-card">
            @if ($item->image)
                <img src="{{ $item->image }}" alt="{{ $item->title }}">
            @endif
            <div class="body">
                <h2>{{ $item->title }}</h2>
                <div class="meta">
                    {{ $item->category->name }} · {{ $item->published_at?->format('d.m.Y') }}
                </div>
                <p>{{ Str::limit($item->content, 150) }}</p>
            </div>
        </article>
    @empty
        <p>Пока новостей нет.</p>
    @endforelse
@endsection
