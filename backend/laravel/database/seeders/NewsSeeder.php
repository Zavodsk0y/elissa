<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory(5)->state(new Sequence(
            [
                'title' => 'Tesla анонсировала новую модель Roadster',
                'text' => 'Tesla представила новый Roadster, который станет самым быстрым серийным автомобилем в мире с ускорением до 100 км/ч за 1.9 секунды.',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'news_seeders/news1.jpg'
            ],
            [
                'title' => 'Volvo обещает 100% электрический модельный ряд к 2030 году',
                'text' => 'Volvo Cars объявила о своем плане полного перехода на производство электромобилей в течение следующего десятилетия.',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'news_seeders/news2.jpg'
            ],
            [
                'title' => 'Volkswagen вложит миллиарды в производство батарей',
                'text' => 'VW анонсировал создание шести новых заводов по производству батарей в Европе для поддержки своих целей по электрификации.',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'news_seeders/news3.png'
            ],
            [
                'title' => 'Toyota запускает новый водородный автомобиль Mirai',
                'text' => 'Обновленный Toyota Mirai обещает больший запас хода и улучшенные характеристики, подтверждая обязательства Toyota перед водородной энергетикой.',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'news_seeders/news4.jpg'
            ],
            [
                'title' => 'Ford расширяет линейку гибридных и электрических F-150',
                'text' => 'Ford добавляет новые гибридные и полностью электрические версии своих популярных грузовиков F-150, целясь в будущее без выбросов.',
                'created_at' => now(),
                'updated_at' => now(),
                'image_path' => 'news_seeders/news5.jpg'
            ]
        ))->create();
    }
}
