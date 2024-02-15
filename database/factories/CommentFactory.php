<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'             => $this->faker->paragraph,
            'user_id'          => 1,
            'commentable_type' => 'App\Models\Post',
            'commentable_id'   => Post::factory()->make()->id,

            //
        ];
    }
}
