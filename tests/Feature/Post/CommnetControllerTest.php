<?php

namespace Tests\Feature\Post;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommnetControllerTest extends TestCase
{
    use RefreshDatabase;
  
    public function test_it_displays_a_comment()
    {
        $post = Post::factory()->create();
        $comment = Comment::factory()->create(['post_id' => $post->id]);

        $response = $this->get(route('posts.show', $post->id));
        $response->assertOk();
        $response->assertSee($comment->comment);
    }

    public function test_it_can_store_a_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('comments.store'), [
                'comment' => 'Test new comment',
                'user_id' => $user->id,
                'post_id' => $post->id,
            ]);

        $response = $this->get(route('posts.show',  $post->id));
        $response->assertOk();
        $this->assertTrue(Comment::where('comment', 'Test new comment')->exists());
    }

    public function test_it_can_edit_a_commet()
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->get(route('comments.edit' , ['comment' => $comment]));

       $response->assertStatus(200);
       $response->assertSee($comment->comment);
    }

    public function test_it_can_update_a_comment()
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $updateComment = [
            'commentUpdate' => 'Updated comment',
            'user_id' => $user->id,
            'post_id' => $comment->post_id,
        ];

        $response = $this->actingAs($user)
            ->patch(route('comments.update', ['comment' => $comment]), $updateComment);
        $response->assertRedirect(route('posts.show', $comment->post_id));  

        $comment->refresh();
        $this->assertEquals('Updated comment', $comment->comment);
    }

    public function test_it_can_delete_a_comment()
    {
        $user = User::factory()->create();
        $comment = Comment::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
            ->delete(route('comments.delete', ['comment' => $comment]));

        $response->assertRedirect(route('posts.show', $comment->post_id));
        
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }
}
