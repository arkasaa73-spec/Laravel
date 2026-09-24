<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'content',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Каждая новость принадлежит одной категории
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
