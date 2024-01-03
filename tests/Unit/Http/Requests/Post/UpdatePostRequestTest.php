<?php

namespace Test\Unit\Http\Requests\Post;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\Post\UpdatePostRequest;

class UpdatePostRequestTest extends TestCase
{
    public function testUnathorized()
    {
        $post = Post::factory()->create();
        $request = new UpdatePostRequest;
        $request->merge([
            'post' => $post
        ]);

        $request->setUserResolver(fn() => User::factory()->create());

        $this->assertFalse($request->authorize());
    }

    public function testAthorized()
    {
        $post = Post::factory()->create();
        $request = new UpdatePostRequest;
        $request->merge([
            'post' => $post
        ]);

        $request->setUserResolver(fn() => $post->user);

        $this->assertTrue($request->authorize());
    }
}
