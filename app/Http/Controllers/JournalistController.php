<?php

namespace App\Http\Controllers;

use App\Models\Category;

class JournalistController extends Controller
{
    // Показываем форму написания/редактирования статьи
    public function create()
    {
        $categories = Category::all(); // для выпадающего списка категорий

        return view('journalist.create', compact('categories'));
    }

    // Сохранение статьи будет реализовано на следующем этапе (пока не трогаем)
}
