<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Video extends Model
{
    use SoftDeletes , Translatable;

    protected $dates = ['deleted_at'];
    protected $translatable = ['title', 'description'];


}
