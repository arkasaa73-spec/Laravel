<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

// Главная — все новости
Route::get('/', [NewsController::class, 'index'])->name('home');

// Категория — новости одной темы (Laravel находит Category по slug)
Route::get('/category/{category:slug}', [NewsController::class, 'category'])->name('category');

// Журналист — форма написания статьи (пока без сохранения)
Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist.create');

// Админ — список статей + смена ролей (пока без сохранения)
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
