<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    // Главная — все новости, от новых к старым, по 5 на страницу
    public function index()
    {
        $news = News::with(['category', 'author'])
            ->orderByDesc('published_at')
            ->paginate(5);

        return view('news.index', compact('news'));
    }

    // Страница одной категории
    public function category(Category $category)
    {
        $news = $category->news()
            ->with('author')
            ->orderByDesc('published_at')
            ->paginate(5);

        return view('news.category', compact('category', 'news'));
    }
}
