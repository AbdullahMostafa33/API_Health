<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'specialty',
        'about',
        'address',
        'phone',
        'image'
    ];

    public function scopeSearch($query)
    {
        if (request('search') ) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('specialty', 'like', '%' . request('search') . '%');
        }
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function messages_relation()
    {
        return $this->hasMany(Message::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'doctorID');
    }
}
