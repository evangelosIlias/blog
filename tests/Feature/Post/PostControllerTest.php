<?php

namespace Tests\Feature\Post;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
  
    public function test_it_displays_a_post()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('posts.show', $post->id));
        $response->assertOk();
    }

    public function test_it_can_create_a_post()
    {
        $response = $this->actingAs($user = User::factory()->create())
            ->post(route('posts.store'), [
                'title' => 'Test new title',
                'content' => 'Test new content',
            ]);

        $response->assertRedirect(route('home'));

        $post = Post::where(['title' => 'Test new title'])->first();
        $this->assertEquals('Test new title', $post->title);
        $this->assertEquals('Test new content', $post->content);
    }

    public function test_it_can_update_a_post()
    {
        $user = $this->user();
        $post = Post::factory(['user_id' => $user->id])->create();
        
        $response = $this->actingAs($user)
            ->patch(route('posts.update' , ['post' => $post]), [
                'title' => 'Updated title',
                'content' => 'Updated content',
            ]);

        $response->assertRedirect(route('posts.show', $post->id));

        $post->refresh();
        $this->assertEquals('Updated title', $post->title);
        $this->assertEquals('Updated content', $post->content);
    }

    public function test_it_can_search_by_title()
    {
        $post = Post::factory()->create([
            'title' => 'Sample Title',
        ]);

        $other = Post::factory()->create([
            'title' => 'Another Title',
        ]);

        $response = $this->actingAs($post->user)
            ->get(route('posts.search', ['searchQuery' => 'Sample Title']));
        $response->assertOk()
            ->assertSee($post->title)
            ->assertDontSee($other->title);
    }

    public function test_it_can_search_by_content()
    {
        $post = Post::factory()->create([
            'content' => 'Sample Content',
        ]);

        $other = Post::factory()->create([
            'content' => 'Other content'
        ]);

        $response = $this->actingAs($post->user)
            ->get(route('posts.search', ['searchQuery' => 'Sample Content']));
        $response->assertOk()
            ->assertSee($post->content)
            ->assertDontSee($other->contet);
    }

    public function test_it_can_search_by_comment()
    {
        $comment = Comment::factory()->create([
            'comment' => 'Sample Comment',
        ]);

        $other = Comment::factory()->create([
            'comment' => 'Other Comment'
        ]);

        $response = $this->actingAs($comment->post->user)
            ->get(route('posts.search', ['searchQuery' => 'Sample Comment'])); 
        $response->assertOk()
            ->assertSee($comment->comment)
            ->assertDontSee($other->comment);
    }
 
    private function user(): User
    {
        return User::factory()->create();
    }
}
