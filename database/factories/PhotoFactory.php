<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'path' => 'https://picsum.photos/seed/'.$this->faker->unique()->word.'/800/600', // Placeholder image
            'order' => $this->faker->numberBetween(0, 100),
        ];
    }
}
