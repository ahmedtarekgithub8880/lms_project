<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Assignment extends Model
{
    use Translatable;
    protected $translatable = ['title'];

    
    public function scopeTrainer($query){
        
        
        return $query;
        
    }
}
