<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if ($method == 'PUT') {
            return [
                'messageContent' => ['required'],
               
            ];
        } else {

            return [
               
                'messageContent' => ['sometimes', 'required'],
                
            ];
        }
    }
    protected function prepareForValidation()
    {
        $this->merge([ 
            'sender_id'=>  $this->senderId,
            'receiver_id'=>  $this->receiverId,
            'message_content'=>  $this->messageContent,
        ]);
    }
}
