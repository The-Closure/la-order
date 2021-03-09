<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Orderitem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable=['name','desc','status','featured','price','restaurant_id','category_id'];

    //the meal belong to one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    //the meal belong to one category
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
    /**
     * Get the phone associated with the user.
     */
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class);
    }
}
