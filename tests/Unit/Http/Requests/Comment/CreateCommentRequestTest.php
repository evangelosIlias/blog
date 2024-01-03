<?php

namespace Test\Unit\Http\Requests\Comment;

use Tests\TestCase;
use App\Http\Requests\Comment\CreateCommentRequest;

class CreateCommentRequestTest extends TestCase
{
    public function testValidationFails()
    {
        $request = new CreateCommentRequest;
        $validator = validator(rules: $request->rules());

        $this->assertFalse($validator->passes());
    }

    public function testValdiationPasses()
    {
        $request = new CreateCommentRequest;
        $request->merge(['post_id' => 'a post id', 'comment' => 'Some test comment']);

        $validator = validator($request->all(), $request->rules());
        $this->assertTrue($validator->passes());
    }
}