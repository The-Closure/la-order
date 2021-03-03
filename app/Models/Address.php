<?php

namespace App\Models;
use app\http\models\Area;
use app\http\models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

protected $fillable=["city","street","details"];

 //Get the area that owns the address.

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

 // Get the user that owns the address.

public function user()
{
    return $this->belongsTo(User::class);
}
}
