<?php

namespace App\Http\Controllers;

use App\Course;
use App\Http\Controllers\Controller;
use App\Lesson;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Models\Category;

class AjaxController extends Controller
{

    public function filter(Request $request)
    {
      if($request->ajax())
        {
          $id =$request->category_id;
          $courses = Course::with('category')->where('category_id' ,  $id)->get();

          return response()->json($courses);

        }
    }

    public function all(Request $request)
    {
      if($request->ajax())
        {
          $courses = Course::with('lessons')->latest()->take(6)->get();
          return response()->json($courses);
        }
    }

    public function all_shop(Request $request)
    {
      if($request->ajax())
        {
          $Products = Product::all();
          return response()->json($Products);
        }
    }

    public function filter_shop( Request $request){
        if($request->ajax()){
            $id =$request->category_id;
            $_products = Product::where('p_category_id',$id)->get();
            return response()->json($_products);
        }
    }
    public function all_artikl(Request $request)
    {
      if($request->ajax())
        {
          $Products = Product::all();
          return response()->json($Products);
        }
    }

    public function filter_artikl( Request $request){
        if($request->ajax()){
            $id =$request->category_id;
            $_products = Product::where('p_category_id',$id)->get();
            return response()->json($_products);
        }
    }

}
