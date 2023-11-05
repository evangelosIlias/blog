<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string|min:2|max:100',
            'content' => 'required|string|min:10|max:500',
        ];
    }
}
