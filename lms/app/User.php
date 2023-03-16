<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravelista\Comments\Commenter;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends \TCG\Voyager\Models\User   implements MustVerifyEmail
{
    use Notifiable ,Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'telephone','password',  'avatar', 'provider','provider_id','email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopeType($query)
    {
        return $query->where('type', 2);
    }



    public  function user_cources(){

        return $this->hasMany('App\Applicant','user_id');


    }

    public function applicant()
    {
        return $this->hasMany('App\Applicant','user_id');

    }

    public function quiz_score()
    {
        return $this->hasMany('App\QuizScore','user_id');

    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class,'user_id');

    }

    

}
