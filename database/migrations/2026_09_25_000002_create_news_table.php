<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Таблица новостей (статей)
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained()      // связь с таблицей categories
                ->cascadeOnDelete(); // если категорию удалят - удалятся и её новости
            $table->string('title');          // заголовок новости
            $table->string('slug')->unique(); // для URL
            $table->string('image')->nullable(); // путь к картинке обложки
            $table->text('content');          // текст статьи
            $table->timestamp('published_at')->nullable(); // дата публикации
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
