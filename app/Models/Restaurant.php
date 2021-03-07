<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone','logo','has_delivery','working_hours','rating','epayment'];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the meals for the Restaurant.
     */
    public function meals()
    {
        return $this->hasMany(Meal::class);
    }
}
