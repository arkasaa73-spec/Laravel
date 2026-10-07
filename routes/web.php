<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\NewsController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Главная — все новости
Route::get('/', [NewsController::class, 'index'])->name('home');

// Категория — новости одной темы (Laravel находит Category по slug)
Route::get('/category/{category:slug}', [NewsController::class, 'category'])->name('category');

// Регистрация и вход — только для гостей (вошедших перекинет на главную)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Выход — только для вошедших
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Журналист — писать статьи может только авторизованный пользователь
Route::middleware('auth')->group(function () {
    Route::get('/journalist', [JournalistController::class, 'create'])->name('journalist.create');
    Route::post('/journalist', [JournalistController::class, 'store'])->name('journalist.store');
    Route::get('/journalist/{news}/edit', [JournalistController::class, 'edit'])->name('journalist.edit');
    Route::put('/journalist/{news}', [JournalistController::class, 'update'])->name('journalist.update');
});

// Админ — только для вошедших пользователей с ролью admin (проверяет IsAdmin)
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/role', [AdminController::class, 'updateRole'])->name('admin.role');
});
