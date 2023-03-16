<?php

namespace App\Http\Controllers;

use App\Trainer;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $trainers=Trainer::all();
        return view('about-us')->with(['trainers'=>$trainers]);
    }

    public function trainers(){
        $trainers=Trainer::all();
        return view('trainers')->with(['trainers'=>$trainers]);
    }
}
