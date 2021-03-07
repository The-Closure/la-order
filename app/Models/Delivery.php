<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    
    protected $fillable=['working_hours', 'vehicle', 'user_id'];
    public function area()
    {
        return $this->hasMany(Area::class);
    }
   
    public function user()
    {
        return $this->hasone(User::class);
    }
}
