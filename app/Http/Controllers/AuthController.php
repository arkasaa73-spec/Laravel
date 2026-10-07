<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // password_confirmation проверяется правилом "confirmed"
        $data = $request->validate([
            'login'    => 'required|string|min:3|max:50|unique:users,login',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Пароль захешируется сам (cast 'hashed' в модели User)
        $user = User::create($data);

        // Сразу входим под новым пользователем
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login'    => 'required|string',
            'password' => 'required|string',
        ]);

        // attempt() сам сравнивает введённый пароль с хешем из БД
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // intended — вернёт туда, куда пользователь шёл до перехода на логин
            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['login' => 'Неверный логин или пароль'])
            ->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
