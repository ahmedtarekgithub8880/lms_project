<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EventRecord extends Model
{
    protected $fillable=['name','email','phone','event_id'];

    public function event(){

        return $this->belongsTo(Event::class,'event_id');
    }
}
