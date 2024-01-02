<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    use HasFactory;

        
    public function orderProduct()
 

        {
        return $this->belongsTo(Product::class,'product_id', 'id');
        }


        public function orderAdditional()
        {
            return $this->belongsToMany(Additional::class, 'additional_order_products',
             'order_product_id',
              'additional_id',
               'id');
        }

        public function orderUser()
        {
         return $this->belongsTo(User::class, 'user_id', 'id');
        }

        public function orderlist()

        {
         return $this->hasMany( OrderList::class);
        }


}
