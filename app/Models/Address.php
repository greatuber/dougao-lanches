<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    // protected $filable = ['city','district','street','number','zipcode','complement','user_id'];
    protected $guarded = [];

    public function userAdress()
      {
        return $this->belongsTo(User::class, 'user_id', 'id');
      }
}
