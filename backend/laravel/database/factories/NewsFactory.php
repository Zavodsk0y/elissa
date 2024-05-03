<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realTextBetween(10, 60),
            'text' => $this->faker->realTextBetween(100, 300),
            'created_at' => now(),
            'updated_at' => now(),
            'image_path' => $this->faker->imageUrl
        ];
    }
}
