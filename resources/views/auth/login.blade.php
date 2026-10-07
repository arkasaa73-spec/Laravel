@extends('layouts.app')

@section('title', 'Вход — GameWave')

@section('content')
    <h1>Вход</h1>

    <form method="POST" action="{{ route('login') }}" class="article-form">
        @csrf

        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" value="{{ old('login') }}" autofocus>
            @error('login')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password">
            @error('password')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Войти</button>
        <p class="form-hint">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
    </form>
@endsection
