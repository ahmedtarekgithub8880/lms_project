<?php

namespace App\Models;

use App\Applicant;
use App\CartItem;
use App\CourseFavourite;
use App\Order;
use App\Wishlist;
use App\Trainer;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Models\Role;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function wishlist()
    {

        return $this->hasMany(Wishlist::class);

    }
    public function favs()
    {

        return $this->hasMany(CourseFavourite::class);

    }

    public function items()
    {

        return $this->hasMany(CartItem::class);

    }

    public function orders()
    {

        return $this->hasMany(Order::class)->latest();

    }

    public function application()
    {
        return $this->hasMany(Applicant::class);

    }

    

    public function trainer()
    {
        return $this->hasOne(Trainer::class);

    }


    public function role()
    {
        return $this->belongsTo(Role::class);

    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function quiz_score()
    {
        return $this->belongsTo(QuizScore::class);

    }




}
