<?php

namespace App;

use App\Models\User;
use App\Assignment;
use Illuminate\Database\Eloquent\Model;


class Resolf extends Model
{
   protected $fillable=['file','user_id','assignment_id'];
 public function user(){
    return $this->belongsTo(User::class);
 }   

 public function assignment(){
    return $this->belongsTo(Assignment::class);
}   
}
