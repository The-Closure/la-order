<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
         /**
     * Get the meal for the category.
     */
    public function meals()
    {
        return $this->hasMany(Meals::class);
    }
}
