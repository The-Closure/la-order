<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
     /**
     * Get the order that owns the orderitem.
     */
    protected $fillable=['meal_id','quantite','price'];
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
