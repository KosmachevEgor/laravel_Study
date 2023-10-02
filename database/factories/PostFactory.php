<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => Category::get()->random()->id,
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'likes' => random_int(0,10000),
            'isEnable' => 1
        ];
    }
}
