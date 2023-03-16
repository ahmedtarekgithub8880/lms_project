<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class News extends Model
{

    use SoftDeletes ,Translatable;
    protected $dates = ['deleted_at'];
    protected $translatable = ['title' ,'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
