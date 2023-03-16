<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Order extends Model
{
    protected $fillable = ['user_id' , 'total_price' ,'address' ,'phone', 'first_name', 'last_name' ,'email' ,'state' ,'city' ,'postal_code'];

    use Translatable;
    
    
    protected $translatable = ['name'];
    public function order_items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    
}
