<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => 'required',
            'comment' => 'required|string|min:5|max:255',
        ];
    }
}
