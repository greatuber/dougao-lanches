<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name'];

  public function product_catergory(){
    return $this->belongsTo(Product::class);
  }
}
