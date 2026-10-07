<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JournalistController extends Controller
{
    // Форма написания новой статьи
    public function create()
    {
        $categories = Category::orderBy('id')->get();

        return view('journalist.create', compact('categories'));
    }

    // Сохранение новой статьи: форма -> проверка -> модель News -> БД
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // категория должна реально существовать
            'content'     => 'required|string',
        ]);

        News::create([
            'category_id'  => $data['category_id'],
            'user_id'      => auth()->id(), // автор — вошедший пользователь
            'title'        => $data['title'],
            'slug'         => Str::slug($data['title']) . '-' . Str::lower(Str::random(6)),
            'content'      => $data['content'],
            'published_at' => now(),
        ]);

        return redirect()
            ->route('journalist.create')
            ->with('success', 'Статья сохранена!');
    }

    // Форма редактирования (та же вьюха, но с подставленными данными статьи)
    public function edit(News $news)
    {
        $this->ensureAuthor($news);

        $categories = Category::orderBy('id')->get();

        return view('journalist.create', compact('news', 'categories'));
    }

    // Сохранение изменений
    public function update(Request $request, News $news)
    {
        $this->ensureAuthor($news);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required|string',
        ]);

        // slug не трогаем, чтобы адрес статьи не менялся
        $news->update($data);

        return redirect()
            ->route('journalist.edit', $news)
            ->with('success', 'Изменения сохранены!');
    }

    // Править статью может только её автор, остальным — ошибка 403
    private function ensureAuthor(News $news): void
    {
        abort_unless($news->user_id === auth()->id(), 403);
    }
}
