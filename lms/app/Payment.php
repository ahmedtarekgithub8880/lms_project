<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    // protected $casts=[
    //     'data'=>'json',
    // ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
