<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1,2),// Random user id from 1 to 2,
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->text(500),
            'image' => 'https://source.unsplash.com/random/200x200?sig=',
        ];
    }
}
