<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    use HasFactory;
    protected $fillable=[
    'sender_id',
    'receiver_id',
    'message_content',

    ];

    public function doctor_relation()
    {
        return $this->belongsTo(Doctor::class, 'sender_id');
    }

    
}
