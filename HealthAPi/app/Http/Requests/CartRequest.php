<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
                'medicineId' => ['required'],
                'quantity' => ['required'],
                'status' => ['required'],

            ];
        } else if ($method == 'PATCH') {
            return [
                'userID' => ['sometimes', 'required'],
                'medicineId' => ['sometimes', 'required'],
                'quantity' => ['sometimes', 'required'],
                'status' => ['sometimes', 'required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' =>  $this->userID,
            'medicine_id' =>  $this->medicineId,
        ]);
    }
}
