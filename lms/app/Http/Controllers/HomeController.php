<?php
namespace App\Http\Controllers;

use App\Course;
use App\Event;
use App\Faq;
use App\Models\User;
use App\News;
use App\Partner;
// use App\Skill;
use App\Trainer;
use App\OurService;
use App\PCategory;
use App\Product;
use App\Widgets\Courses;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use Carbon\Carbon;
use TCG\Voyager\Models\Post;
use Certificationy\Loaders\YamlLoader;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(Request $request)
    {

        $categories = Category::all();
        $products = Product::all();
        $p_categories =PCategory::all();
        $courses = Course::all();
        $trainers = Trainer::take(2)->get();
        $services=OurService::all();
        $count_courses = Course::count();
        $count_users = User::count();
        $news  = News::paginate(6);
        $posts = News::orderBy('created_at', 'desc')->take(3)->get();
        $partners = Partner::all();
        // $skills = Skill::all();
        $freeCourses = Course::where('price' , 0)->with('lessons')->get();
        $paid = Course::where('price' ,'!=', 0)->with('lessons')->take(9)->get();
        $events = Event::take(6)->get();

        // instgram feeds
        $items = [];
        if($request->has('username')){
        $client = new \GuzzleHttp\Client;
        $url = sprintf('https://www.instagram.com/horizonsstat/', $request->input('username'));
         $response = $client->get($url);
         $items = json_decode((string) $response->getBody(), true)['items'];


        }
        // return ($courses);
        //end instgram feeds
        // dd($posts);

        // return($news);
        return view('index')->with(['events'=>$events,'paid'=>$paid, 'free'=>$freeCourses ,'partners' => $partners ,'categories' => $categories, 'courses' => $courses, 'count_courses' => $count_courses, 'count_users' => $count_users, 'posts' => $posts, 'trainers' => $trainers, 'services' => $services, 'items'=> $items ,'p_categories'=>$p_categories,'products'=>$products, 'news'=>$news ]);
        //return redirect()->route('index-copy', [$categories]);
        // return view('home');
    }

    public function swap($locale)
    {
        app()->setLocale($locale);
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }


    public function faqs()
    {
        $faqs = Faq::all();
        return view('faqs', compact('faqs'));
    }

    public function saveNewsLetter(Request $request)
    {

        $faqs = Faq::all();
        return view('faqs', compact('faqs'));

    }


}
