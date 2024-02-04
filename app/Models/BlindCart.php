<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlindCart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blindCartUser()
     {
        return $this->BelongsTo( User::class, 'user_id', 'id');
     }
}
