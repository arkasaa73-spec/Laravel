<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // У одной категории может быть много новостей
    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
