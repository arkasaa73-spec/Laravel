<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;

class GameNewsSeeder extends Seeder
{
    // Наполняем базу тестовыми данными для GameWave
    public function run(): void
    {
        // Пока берём одну категорию — "Консоли" (остальные добавим позже)
        $category = Category::firstOrCreate(
            ['slug' => 'konsoli'],
            ['name' => 'Консоли']
        );

        $news = [
            [
                'title' => 'PlayStation 6 показала первый геймплей',
                'slug' => 'ps6-gameplay-reveal',
                'image' => 'https://picsum.photos/seed/ps6/800/450',
                'content' => 'Sony представила первые кадры геймплея на новой консоли PlayStation 6, продемонстрировав улучшенную графику и загрузку уровней в реальном времени.',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Xbox анонсировал новую эксклюзивную игру',
                'slug' => 'xbox-new-exclusive',
                'image' => 'https://picsum.photos/seed/xbox/800/450',
                'content' => 'Microsoft объявила о разработке нового эксклюзива для Xbox Series X|S, релиз запланирован на следующий год.',
                'published_at' => now()->subDay(),
            ],
            [
                'title' => 'Nintendo Switch 2: обновление системы принесло новые функции',
                'slug' => 'switch2-update',
                'image' => 'https://picsum.photos/seed/switch2/800/450',
                'content' => 'Вышло крупное системное обновление для Nintendo Switch 2, добавляющее облачные сохранения и улучшенный интерфейс.',
                'published_at' => now(),
            ],
        ];

        foreach ($news as $item) {
            News::firstOrCreate(
                ['slug' => $item['slug']],
                array_merge($item, ['category_id' => $category->id])
            );
        }
    }
}
