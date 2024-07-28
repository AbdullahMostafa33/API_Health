<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'doctorId' => $this->doctor_id,
            'time' => $this->time,
            "date" => $this->date,
            "status" => $this->status,
            'doctor' =>  $this->doctor,
        ];
    }
}
