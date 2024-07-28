<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UpdateAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $method = $this->method();      
       if($method=='PUT'){
            return [
                'userId' => ['required'],
                'doctorId' => ['required'],
                'time' => ['required'],
                "date" => ['required'],
                "status" => ['required'],
            ];       
       }
       else{
            return [
                'userId' => ['sometimes', 'required'],
                'doctorId' => ['sometimes', 'required'],
                'time' => ['sometimes', 'required'],
                "date" => ['sometimes', 'required'],
                "status" => ['sometimes', 'required'],
            ];
       }       
    }
    protected function prepareForValidation()
    {
       if($this->postalCode){
            $this->merge([
                'user_id' =>  $this->userId,
                'doctor_id' =>  $this->doctorId,
            ]);
       }
    } 
}
