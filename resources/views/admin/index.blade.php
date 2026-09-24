@extends('layouts.app')

@section('title', 'Админ — GameWave')

@section('content')
    <h1>Управление статьями</h1>

    {{-- Таблица статей: редактирование/блокировка/удаление сверстаны,
         сама логика будет подключена на следующем этапе --}}
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

    <h1>Изменение роли пользователя</h1>

    {{-- Форма смены роли — пока только интерфейс --}}
    <form method="POST" action="#" class="article-form" onsubmit="event.preventDefault()">
        @csrf

        <div class="form-group">
            <label for="user_id">Пользователь</label>
            <select id="user_id" name="user_id">
                <option value="1">Иван Иванов</option>
                <option value="2">Мария Петрова</option>
                <option value="3">Алексей Смирнов</option>
            </select>
        </div>

        <div class="form-group">
            <label for="role">Новая роль</label>
            <select id="role" name="role">
                <option value="user">Пользователь</option>
                <option value="journalist">Журналист</option>
                <option value="admin">Администратор</option>
            </select>
        </div>

        <button type="submit" class="btn-submit">Изменить роль</button>
    </form>
@endsection
