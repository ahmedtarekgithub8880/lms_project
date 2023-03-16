<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Event extends Model
{
    use SoftDeletes;
    use Spatial;
    use Translatable;

    protected $translatable = ['title' , 'description' , 'organizer'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    protected $dates = ['deleted_at' , 'start_date','end_date'];
    protected $spatial = ['coordinates'];

}
