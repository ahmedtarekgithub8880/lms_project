<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public $additional_attributes = ['order_details'];
    protected $fillable = ['order_id','product_id' ,'product_price' ,'product_qty' ,'product_total'];

    public function order(){
      return   $this->belongsTo(Order::class,'order_id');
    }

    public function product(){
        return  $this->belongsTo(Product::class);
    }

    public function getOrderDetailsAttribute()
    {
        return "{$this->product->name} ( X   {$this->product_qty} ) = $ {$this->product_total} ";
    }
}
