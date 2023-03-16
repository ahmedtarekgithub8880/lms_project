<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Resource extends Model
{
    use SoftDeletes;
    use Translatable;

    protected $translatable = ['title' ,'description'];

    protected $dates = ['deleted_at'];
}
