<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function Nette\Utils\attributes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sub =  [
        'Bugungi kun',
        'Xorij xabarlari',
        'Sport',
    ];

        $subc = json_encode($sub);


        return [
            'name' => fake()->name(),
            'subcategories' => $subc,
            'description' => fake()->sentence(),
            'slug' => fake()->slug()
        ];
    }
}
