<?php

namespace Test\Unit\Http\Requests\Comment;

use Tests\TestCase;

use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\Comment\DeleteCommentRequest;

class DeleteCommentRequestTest extends TestCase
{
    public function testUnathorized()
    {
        $comment = Comment::factory()->create();
        $request = new DeleteCommentRequest;
        $request->merge([
            'comment' => $comment
        ]);

        $request->setUserResolver(fn() => User::factory()->create());

        $this->assertFalse($request->authorize());
    }

    public function testAthorized()
    {
        $comment = Comment::factory()->create();
        $request = new DeleteCommentRequest;
        $request->merge([
            'comment' => $comment
        ]);

        $request->setUserResolver(fn() => $comment->user);

        $this->assertTrue($request->authorize());
    }
}