@extends('layouts.app')

@section('title', $category->name . ' — GameWave')

@section('content')
    <h1>{{ $category->name }}</h1>

    @forelse ($news as $item)
        <article class="news-card">
            @if ($item->image)
                <img src="{{ $item->image }}" alt="{{ $item->title }}">
            @endif
            <div class="body">
                <h2>{{ $item->title }}</h2>
                <div class="meta">{{ $item->published_at?->format('d.m.Y') }}</div>
                <p>{{ Str::limit($item->content, 150) }}</p>
            </div>
        </article>
    @empty
        <p>В этой категории пока нет новостей.</p>
    @endforelse
@endsection
