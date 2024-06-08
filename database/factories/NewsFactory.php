<?php

namespace Database\Factories;

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
            'user_id' => 1,
             'category_id' => rand(1, 3),
            'name' => fake()->name(),
            'description' => fake()->sentence(6),
            'slug' => fake()->slug(2)
        ];
    }
}
