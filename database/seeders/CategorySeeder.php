<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    // Добавляем категории сайта. firstOrCreate — повторный запуск ничего не задублирует
    public function run(): void
    {
        $categories = [
            ['name' => 'Консоли',        'slug' => 'konsoli'],
            ['name' => 'ПК-игры',        'slug' => 'pk-igry'],
            ['name' => 'Мобильные игры', 'slug' => 'mobilnye-igry'],
            ['name' => 'Киберспорт',     'slug' => 'kibersport'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], ['name' => $category['name']]);
        }
    }
}
