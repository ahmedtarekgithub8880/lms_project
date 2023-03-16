<?php

namespace App\Http\Controllers;
use App\Course;
use App\Product;
use App\OurService;
use App\Widgets\Courses;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class SearchController extends Controller
{

    public function  index_copy(){
        return view('index-copy');
    }

    public function searchCourse(Request $request)
    {
        
        if ($request->search){
            $all_cources = Course::WhereTranslation('title' , 'like' , '%'.$request->search.'%')->get();
            $all_services = OurService::WhereTranslation('title' , 'like' , '%'.$request->search.'%')->get();
            $all_products = Product::WhereTranslation('name' , 'like' , '%'.$request->search.'%')->get();
        }
        else {
            $all_cources = [];
            $all_services = [];
            $all_products = [];
        }
        return view('search', compact('all_cources','all_services','all_products'));
    }

    public function filtercourses($category_id)
    {
        $filterd='yes';
        $filterd_courses=Course::where('category_id',$category_id)->get();
    }


}
