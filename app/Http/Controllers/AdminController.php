<?php

namespace App\Http\Controllers;

use App\Models\News;

class AdminController extends Controller
{
    // Список всех статей + форма смены ролей
    public function index()
    {
        $news = News::with('category')
            ->orderByDesc('published_at')
            ->get();

        return view('admin.index', compact('news'));
    }

    // Удаление, блокировка статей и реальное сохранение роли
    // будут реализованы на следующем этапе (сейчас только интерфейс)
}
