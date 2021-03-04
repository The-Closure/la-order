<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\http\Models\Order;
use app\http\Models\meal;

class OrderItem extends Model
{
    use HasFactory;
     /**
     * Get the order that owns the orderitem.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    /**
     * Get the meal that owns the orderitem.
     */
    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}

