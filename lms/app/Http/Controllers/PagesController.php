<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;
use  TCG\Voyager\Models\Category;

class PagesController extends Controller
{
    //

    public function pages($slug)
    {






        $page = Page::where('slug', $slug)->get();
        $cats=Category::all();


       // $page_sub = Page::where('sub', $sub)->get();


 
            return view('pages.pages', compact('page','cats'));
  

    }


}
