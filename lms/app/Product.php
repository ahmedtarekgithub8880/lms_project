<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use Translatable;
    protected $translatable = ['name' ,'description' ,'brief'];
//    protected $appends =['number_lang'];
    protected $fillable = ['qty'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function category(){
        return $this->belongsTo(PCategory::class,'p_category_id');
    }


}
