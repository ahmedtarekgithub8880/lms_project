<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TCG\Voyager\Models\User;


class Applicant extends Model
{
    use SoftDeletes;

    protected $fillable = [
            'user_id',
            'course_id',
            'price'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeApproved($query)
    {
        return $query->where('approve' , 1);
    }


}
