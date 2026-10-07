@extends('layouts.app')

@section('title', 'Админ — GameWave')

@php
    $roleNames = [
        'user'       => 'Пользователь',
        'journalist' => 'Журналист',
        'admin'      => 'Администратор',
    ];
@endphp

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h1>Управление статьями</h1>

    {{-- Кнопки действий со статьями пока только сверстаны --}}
    <table class="admin-table">
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Категория</th>
                <th>Дата</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->published_at?->format('d.m.Y') }}</td>
                    <td class="actions">
                        <button type="button" class="btn-small btn-edit">Редактировать</button>
                        <button type="button" class="btn-small btn-block">Заблокировать</button>
                        <button type="button" class="btn-small btn-delete">Удалить</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Статей пока нет.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h1>Пользователи</h1>

    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Роль</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $roleNames[$user->role] ?? $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Изменение роли пользователя</h1>

    <form method="POST" action="{{ route('admin.role') }}" class="article-form">
        @csrf

        <div class="form-group">
            <label for="user_id">Пользователь</label>
            <select id="user_id" name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @selected(old('user_id') == $user->id)>
                        {{ $user->login }} ({{ $roleNames[$user->role] ?? $user->role }})
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Новая роль</label>
            <select id="role" name="role">
                @foreach ($roleNames as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            @error('role')
                <div class="field-error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Изменить роль</button>
    </form>
@endsection
