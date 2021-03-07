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
    public function address(){
        return $this->hasmany(Address::class);
    }
    public function delivery()
    {
        return $this->hasone(Delivery::class);
    }
    public function resturant()
    {
        return $this->hasone(Resturant::class);
    }
    public function order()
    {
        return $this->hasone(Order::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function del_orders()
    {
        return $this->hasMany(Order::class, 'delivery_id');
    }

}
