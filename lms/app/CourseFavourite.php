<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseFavourite extends Model
{

    protected $fillable =['user_id' , 'course_id'];

    public function course()
    {

        return $this->belongsTo(Course::class);
    }
}
