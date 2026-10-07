<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // role сюда не добавляем: роль меняет только админ, а не форма регистрации
    protected $fillable = ['login', 'password'];

    protected $hidden = ['password', 'remember_token'];

    // 'hashed' — Laravel сам хеширует пароль при сохранении в БД
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    // Один пользователь может написать много статей
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
