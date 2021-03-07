<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    
    protected $fillable=['working_hours', 'vehicle', 'user_id'];

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }

    public function user()
    {
        return $this->hasone(User::class);
    }
}
