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

    

}

