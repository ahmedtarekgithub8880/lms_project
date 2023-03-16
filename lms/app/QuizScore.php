<?php

namespace App;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class QuizScore extends Model
{
    protected $fillable=['id','score','quiz_id','user_id'];



    public function quiz()
    {
        return $this->belongsTo(Quiz::class,'quiz_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
