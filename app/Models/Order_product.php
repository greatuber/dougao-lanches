<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
   
    protected $guarded = [];
    
     public function orderProductProduct()

       {
        return $this->belongsTo(Product::class,'product_id', 'id');
       }

    public function orderProductAdditional(){
        return $this->belongsTo(Additional::class, 'additional_id', 'id');
    }

    public function orderPorductUser()
       {
        return $this->belongsTo(User::class, 'user_id', 'id');
       }
}
