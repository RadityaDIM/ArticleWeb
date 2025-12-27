<?php

namespace Database\Factories;

use Psy\Util\Str;
use App\Models\User;
use Illuminate\Support\Str as SupportStr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::factory(),
            'category_id' => $this->faker->numberBetween(1, 5),
            'slug' => SupportStr::slug((fake()->sentence())),
            'body' => fake()->paragraph(20)
        ];
    }
}
