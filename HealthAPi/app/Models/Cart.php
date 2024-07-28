<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected   $fillable = ['user_id', 'medicine_id', 'quantity', 'status'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
