<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CourseRating extends Model
{
    
    protected $fillable =['user_id','course_id','rate'];
    public function course()
    {

        return $this->belongsTo(Course::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
