<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->sentence(45),
            'image'=> $this->faker->imageUrl($width = 640, $height = 480),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
