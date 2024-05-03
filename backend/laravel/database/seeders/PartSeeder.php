<?php

namespace Database\seeders;

use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Part::factory(6)->state(new Sequence(
            [
                'header' => 'Коленвал Шевроле',
                'description' => 'Коленвал для бензиновых двигателей Chevrolet',
                'price' => '20000',
                'category_id' => 1,
                'image_path' => 'parts_seeders/part1.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Головка блока цилиндров Форд',
                'description' => 'Головка блока для Ford Focus, 2.0L',
                'price' => '45000',
                'category_id' => 1,
                'image_path' => 'parts_seeders/part2.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Коробка передач VW',
                'description' => '5-ступенчатая МКПП для Volkswagen Golf',
                'price' => '60000',
                'category_id' => 2,
                'image_path' => 'parts_seeders/part3.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Автоматическая трансмиссия Toyota',
                'description' => 'Автомат для Toyota Corolla',
                'price' => '80000',
                'category_id' => 2,
                'image_path' => 'parts_seeders/part4.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Тормозные колодки Honda',
                'description' => 'Колодки для передних тормозов Honda Accord',
                'price' => '3000',
                'category_id' => 3,
                'image_path' => 'parts_seeders/part5.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'header' => 'Тормозной диск BMW',
                'description' => 'Диск для задних тормозов BMW 3 серии',
                'price' => '7000',
                'category_id' => 3,
                'image_path' => 'parts_seeders/part6.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ))->create();
    }
}
