<?php

namespace Database\seeders;

use App\Models\Part;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::factory(5)->state(new Sequence(
            [
                'header' => 'Замена моторного масла',
                'description' => 'Полная замена моторного масла и масляного фильтра для улучшения работы двигателя',
                'price' => '3000',
                'image_path' => 'services_seeders/service1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Замена тормозных колодок',
                'description' => 'Замена изношенных тормозных колодок для гарантии безопасности вождения',
                'price' => '7000',
                'image_path' => 'services_seeders/service2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Компьютерная диагностика двигателя',
                'description' => 'Полная диагностика состояния двигателя с использованием современного оборудования',
                'price' => '5000',
                'image_path' => 'services_seeders/service3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Шиномонтаж',
                'description' => 'Сезонная замена шин, включая балансировку и установку',
                'price' => '4000',
                'image_path' => 'services_seeders/service4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Химчистка салона автомобиля',
                'description' => 'Глубокая чистка салона с использованием профессиональных моющих средств',
                'price' => '10000',
                'image_path' => 'services_seeders/service5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ))->create();
    }
}
