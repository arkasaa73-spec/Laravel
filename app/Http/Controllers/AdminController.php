<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Статьи + пользователи с их ролями
    public function index()
    {
        $news = News::with('category')
            ->orderByDesc('published_at')
            ->get();

        $users = User::orderBy('id')->get();

        return view('admin.index', compact('news', 'users'));
    }

    // Смена роли пользователя
    public function updateRole(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'role'    => 'required|in:user,journalist,admin',
        ]);

        $user = User::findOrFail($data['user_id']);

        // Защита: админ не может сменить роль себе, иначе можно случайно остаться без админов
        if ($user->id === auth()->id()) {
            return back()->withErrors(['user_id' => 'Нельзя менять роль самому себе']);
        }

        $user->role = $data['role'];
        $user->save();

        return redirect()
            ->route('admin.index')
            ->with('success', 'Роль пользователя ' . $user->login . ' изменена');
    }
}
