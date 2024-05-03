<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'header' => $this->faker->realTextBetween(10, 60),
            'description' => $this->faker->realTextBetween(100, 300),
            'price' => $this->faker->numberBetween(500, 300000),
            'created_at' => now(),
            'updated_at' => now(),
            'image_path' => $this->faker->imageUrl
        ];
    }
}
