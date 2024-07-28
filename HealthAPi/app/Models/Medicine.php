<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

 protected   $fillable=['title', 'description', 'category', 'price', 'image'];

    public function scopeSearch($query)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
