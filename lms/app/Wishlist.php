<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\User;


class Wishlist extends Model
{

    protected $fillable = ['user_id' , 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
