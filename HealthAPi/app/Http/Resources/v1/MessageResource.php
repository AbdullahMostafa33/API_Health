<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'senderId'=>$this->sender_id,
            'receiverId'=>$this->receiver_id,
            'messageContent'=>$this->message_content,
            'createdAt'=>$this->created_at,
            'readAt'=>$this->read_at,

        ];
    }
}
