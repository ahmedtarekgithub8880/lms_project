<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class OurService extends Model
{
    use Translatable;
    protected $translatable = ['title', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
