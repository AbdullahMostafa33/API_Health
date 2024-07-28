<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'specialty' => $this->specialty,
            'about' => $this->about,
            'address' => $this->address,
            'phone' => $this->phone,
            'image' => $this->image,
            'appointments' => AppointmentResource::collection($this->whenLoaded('appointments')),
        ];
    }
}
