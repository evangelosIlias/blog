<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (app()->runningUnitTests()) {
            $user = USer::factory()->create();
            $post = Post::factory()->create();
        } else {
            $post = Post::inRandomOrder()->factory()->create()->first();
            $user = User::inRandomOrder()->factory()->create()->first();
        }

        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment' => $this->faker->paragraph,
        ];
    }
}

