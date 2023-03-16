<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Group extends Model
{
    use Translatable;
    protected $translatable = ['name'];
    /**
     * @return array
     */
    public  function times()
    {
        return $this->hasMany(GroupTime::class);
    }

    public  function course()
    {
        return $this->belongsTo(Course::class);
    }

    public  function groupTimes()
    {
        return $this->hasMany(GroupTime::class);
    }
    

}
