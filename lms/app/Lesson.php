<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Traits\Translatable;

class Lesson extends Model
{
    use Translatable;
    use SoftDeletes;

    protected $translatable =['title' ,'description'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    protected $dates = ['deleted_at', 'duration'];

    public function resources(){
        return $this->hasMany(Resource::class);
    }

    public function assignments(){
        return $this->hasMany(Assignment::class);
    }

    public function video(){
        return $this->hasMany(Video::class);
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
