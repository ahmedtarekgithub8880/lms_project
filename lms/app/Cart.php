<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{
    public function cart(){
        $this->hasMany(CartItems::class);
    }
}
