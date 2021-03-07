<?php

namespace App\Models;
use app\http\models\Address;
use app\http\models\Delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;
    
    protected $fillable = ["name"];

    //Get the address that owns the Areas.
    public function addresses()
    {
        return $this->hasmany(Address::class);
    }

    //Get the deliveris that owns the Areas.
    public function Deliveries()
    {
        return $this->belongsTomany(Delivery::class);
    }
}

