<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    // Главная — выводим все новости
    public function index()
    {
        $news = News::with('category')
            ->orderByDesc('published_at')
            ->get();

        return view('news.index', compact('news'));
    }

    // Страница одной категории — выводим новости только из неё
    // {category:slug} — Laravel сам найдёт запись Category по полю slug
    public function category(Category $category)
    {
        $news = $category->news()
            ->orderByDesc('published_at')
            ->get();

        return view('news.category', compact('category', 'news'));
    }
}
