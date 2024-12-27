<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'poster_image' => $this->faker->imageUrl(640, 480, 'movies', true),
            'is_published' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
