<?php

namespace App\Http\Requests\Comment;

class UpdateCommentRequest extends CreateCommentRequest
{
    public function authorize()
    {  
       return $this->comment->user_id === $this->user()->id;
    }

    public function rules()
    {
        return [
            'commentUpdate' => 'required',
        ];
    }
}
