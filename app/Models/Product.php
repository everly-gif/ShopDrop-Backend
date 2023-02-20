<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category(){
        
        return $this->belongsTo(Category::class,'cid');
    }

    public function users(){
        
        return $this->belongsToMany(User::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
    

}

