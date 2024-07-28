<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable= [
        'userID',
        'doctorID',
        'comment',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

   
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorID');
    }
}
