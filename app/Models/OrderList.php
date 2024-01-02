<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{

    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quamtity',
        'value',
        'additional_id',
        'observation' 
    ];
    
    public function order()
         {
            return $this->belongsTo(Order::class);
         }


     public function product()
         {
            return $this->belongsTo( Product::class);
         }

     public function orderAdditional()
         {
            return $this->belongsToMany(Additional::class,
             'additional_orders',
              'order_id',
              'additional_id',
              'id');
         }
}
