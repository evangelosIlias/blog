<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class DeletePostRequest extends FormRequest
{
    public function authorize()
    {
       return $this->post->user_id === $this->user()->id;
    }
    
}
