@extends('layouts.app')

@section('title', 'Регистрация — GameWave')

@section('content')
    <h1>Регистрация</h1>

    <form method="POST" action="{{ route('register') }}" class="article-form">
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

        <div class="form-group">
            <label for="password_confirmation">Подтверждение пароля</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn-submit">Зарегистрироваться</button>
        <p class="form-hint">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
    </form>
@endsection
