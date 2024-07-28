<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'userID' => $this->user_id,
            'medicineId' => $this->medicine_id,
            'quantity' =>  $this->quantity,
            'status' =>  $this->status,
            'medicine'=>$this->medicine,
        ];
    }
}
