<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCommentRequest extends FormRequest
{
    public function authorize()
    {
       return $this->comment->user_id === $this->user()->id;
    }
    
}
