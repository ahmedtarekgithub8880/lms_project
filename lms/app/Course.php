<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Traits\Translatable;

class Course extends Model
{

    use Translatable;
    use Commentable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $translatable = ['title' ,'description' ,'requirements','learn'];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function Applicant()
    {
        return $this->hasOne(Applicant::class, 'course_id');
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function retin(){

    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function lessons()
    {
        return $this->HasMany(Lesson::class);
    }

    public function scopeTrainer($query){

        if(auth()->user()->role->id == 3){

        return $query->where('trainer_id',auth()->user()->trainer->id);
    }else{
        return $query;
    }
    }
}
