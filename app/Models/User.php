<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Validation\Rule;
class User extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

    public function restaurant()
    {
        return $this->hasOne(Resturant::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function deliveryOrders()
    {
        return $this->hasMany(Order::class, 'delivery_id');
    }

}
