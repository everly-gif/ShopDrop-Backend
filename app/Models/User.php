<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $hidden = ['password'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot(['quantity','amount','id','order_status']);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
     }
}
