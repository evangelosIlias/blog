<?php

namespace Tests\Unit\Commands;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsDeleteInactiveTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_soft_delete_a_post_a_year_old()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id, 'created_at' => now()->subYears(2)]);

        Artisan::call('posts:delete-inactive');
        
        $this->assertSoftDeleted('posts', ['id' => $post->id]);
    }
}
