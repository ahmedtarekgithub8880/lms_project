<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\News;
use App\Slider;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Page;

class HomepageController extends Controller
{
    //


    public function index (){

        $Sliders=Slider::all();

        $Categories=Category::all();

        $page=Page::select('title','excerpt','image','slug')->where('id','2')->get();
        $all_cources=Course::where('home','1')->orderByRaw("RAND()")->get();
        $all_news=News::take(12)->orderByDesc('id')->take(8)->get();


        return view('index' ,compact('Sliders','Categories','page','all_cources','all_news'));

    }
}
