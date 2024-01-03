<?php

namespace App\Http\Requests\Post;

class UpdatePostRequest extends CreatePostRequest
{
    public function authorize()
    {
       return $this->post->user_id === $this->user()->id;
    }
}
