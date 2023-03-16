<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news( Request $request){

        $search = $request->get('search');
        if ($search)
        {
            $news = News::where('title' , 'like','%'.$search.'%')->paginate(12);
            $news->appends(['search' => $search]);
            if($news->isEmpty()){
                return view('not_found');
            }
        }
        else
        {
            $news  = News::paginate(6);
        }

        return view('news.all-news',compact('news'));
    }


    public function single_news(News $news){

        $latestNews = News::latest()->take(6)->get();
        return view('news.single-news' , compact('news' ,'latestNews'));
    }
}
