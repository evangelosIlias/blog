<?php

namespace Test\Unit\Http\Requests\Post;

use Tests\TestCase;
use App\Http\Requests\Post\CreatePostRequest;

class CreatePostRequestTest extends TestCase
{
    public function testValidationFails()
    {
        $request = new CreatePostRequest;
        $validator = validator(rules: $request->rules());

        $this->assertFalse($validator->passes());
    }

    public function testValdiationPasses()
    {
        $request = new CreatePostRequest;
        $request->merge(['title' => 'a title', 'content' => 'Some test content']);

        $validator = validator($request->all(), $request->rules());
        $this->assertTrue($validator->passes());
    }
}
