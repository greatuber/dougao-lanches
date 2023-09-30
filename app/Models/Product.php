<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
   protected $fillable = ['name','price','quanty','description','category_id'];
   
    public function category_product(){
        return $this->hasOne(Category::class, 'category_id', 'id');
    }

}
