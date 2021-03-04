<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Get the orderitems for the order.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
     /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
