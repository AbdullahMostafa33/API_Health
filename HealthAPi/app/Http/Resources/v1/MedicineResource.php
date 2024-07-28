<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicineResource extends JsonResource
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
            'title' => $this->title,
            'description' =>$this->description,
            'category' =>$this->category,
            'price' =>$this->price,
            'image' => 'http://healthdragon.atwebpages.com/get?image='.$this->image,
        ];
    }
}
