<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppointmentRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        
        return true;
    }

    public function rules(): array
    {
        return [
            'userId' => ['required'],
            'doctorId' => ['required'],
            'time' => ['required'],
            "date" => ['required'],
            "status" => ['required'],
        ];
    }
   
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' =>  $this->userId,
            'doctor_id' =>  $this->doctorId,
        ]);
    }
}
