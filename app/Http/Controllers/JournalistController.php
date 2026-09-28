<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalistController extends Controller
{
    // Показываем форму написания статьи
    public function create()
    {
        return view('journalist.create');
    }

    // Принимаем данные формы -> проверяем -> передаём в модель -> она пишет в БД
    public function store(Request $request)
    {
        // 1. Валидация: заголовок и текст обязательны
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 2. Категория пока заглушка — всегда "Консоли"
        $category = Category::firstOrCreate(
            ['slug' => 'konsoli'],
            ['name' => 'Консоли']
        );

        // 3. Модель News создаёт запись в таблице news
        //    slug генерируем из заголовка (+ случайный хвост, чтобы был уникальным)
        News::create([
            'category_id'  => $category->id,
            'title'        => $data['title'],
            'slug'         => Str::slug($data['title']) . '-' . Str::lower(Str::random(6)),
            'content'      => $data['content'],
            'published_at' => now(), // дату ставим автоматически
        ]);

        return redirect()
            ->route('journalist.create')
            ->with('success', 'Статья сохранена!');
    }
}
