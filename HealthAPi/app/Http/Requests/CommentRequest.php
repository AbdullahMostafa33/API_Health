<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'POST') {
            return [
                'userID' => ['required'],
                'doctorID' => ['required'],
                'comment' => ['required'],
                'rating' => ['required'],
                
            ];
        } else if($method == 'PATCH') {
            return [
                'userID' => ['sometimes', 'required'],
                'doctorID' => ['sometimes', 'required'],
                'comment'=> ['sometimes', 'required'],
                'rating'=> ['sometimes', 'required'],
            ];
        }
    }

    
}
