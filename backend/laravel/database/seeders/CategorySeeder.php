<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory(3)->state(new Sequence(
            [
                'name' => 'Двигатели',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Трансмиссия',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Тормозная система',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ))->create();
    }
}
