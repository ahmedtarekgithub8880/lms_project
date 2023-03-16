<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\OurService;
use App\Product;
use App\CourseFavourite;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\QuizAttemptAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Models\Category;
use App\Trainer;
use App\Lesson;
use App\Course;
use App\CourseRating;
use App\Introduction;
use App\QuizScore;

use Mail;
use App\Mail\PurchaseOrderMail;
use App\Mail\JoinCourseMail;

use function MongoDB\BSON\toJSON;

class CoursesController extends Controller
{
    public function create(){
        dd('sns');
    }
        public function index(Request $request, $cat = null)
    {
        $cats = Category::all();
        $cat = $request->cat;
        
        if (isset($cat)) {
            $all_cources = Category::where('slug', $cat)->first();
            }else {
            $all_cources = Course::all();
            }
        

        return view('cources.cources', compact('all_cources', 'cats'));
    }


    public function filterCourse(Request  $request)
    {

        
        $cats = Category::all();

        
        $cat = $request->cat;

        $all_cources =Course::query();
    
        if ($request->search  ){
            $all_cources->whereTranslation('title' , 'like' , '%' . $request->search .'%');
        }
        if ($request->category_id){
            $all_cources->whereIn('category_id' , $request->category_id);
        }
        if ($request->min_price){
            $all_cources->where('price' , '>=', $request->min_price);
        }
        if ($request->max_price){
            $all_cources->where('price' , '<=', $request->max_price);
        }
         $all_cources=$all_cources->get();

        return view('cources.cources' , compact('all_cources', 'cats'));
    }




     public function searchCourse(Request $request)
    {
        $cats = Category::all();
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
        return view('search', compact('all_cources', 'cats','all_services','all_products'));
    }

    public function paid_cources(Request $request)
    {
        $cats = Category::all();
        $all_cources = Course::where('price', '!=', 0)->paginate(2);

        if ($request->ajax()) {
            return response()->json(View::make('cources.ajax', ['all_cources' => $all_cources])->render());
        }
        return view('cources.cources', compact('all_cources', 'cats'));
    }

    public function free_cources(Request $request)
    {
        $cats = Category::all();
        $all_cources = Course::where('price', 0)->paginate(2);

        if ($request->ajax()) {
            return response()->json(View::make('cources.ajax', ['all_cources' => $all_cources])->render());
        }
        return view('cources.cources', compact('all_cources', 'cats'));
    }

    public function category(Request $request, Category $category)
    {
        $cats = Category::all();
        $all_cources = Course::where('category_id', $category->id)->paginate(6);

        if ($request->ajax()) {
            return response()->json(View::make('cources.ajax', ['all_cources' => $all_cources])->render());
        }
        return view('cources.cources', compact('all_cources', 'cats', 'category'));
    }

    public function course_details(Course $course)
    {

        $introduction=Introduction::where('course_id',$course->id)->first();
        $course_details = Course::findOrFail($course->id);
        $lesson_data = Lesson::where('course_id', $course->id)->get();
        $related_courses = Course::where('category_id', $course_details->category_id)
            ->where('id', '!=', $course->id)
            ->get();
        $cats = Category::all();
        $quizzes = Quiz::where('course_id' , $course->id)->get();
        $course_trainers = [];
        
        $course_ratings=CourseRating::where('course_id',$course->id)->pluck('rate')->toArray();
        // $course_ratings=array_sum($course_ratings)/count($course_ratings);
        $course_ratings=number_format((float)$course_ratings, 1, '.', '');

        $user_rate=CourseRating::where('user_id',auth()->id())->where('course_id',$course->id)->first();
        
        foreach ($lesson_data as $trainer) {
            $trainer_data = Trainer::where('id', $trainer->id)->get();
            array_push($course_trainers, $trainer_data);
        }
        if (\Auth::check()) {
            $applicant = Applicant::where('course_id', $course->id)
                ->where('user_id', auth()->user()->id)
                ->first();

            return view('cources.course_details', compact('course_details', 'course_trainers', 'lesson_data', 'related_courses', 'cats', 'applicant' , 'quizzes','introduction','course_ratings','user_rate','course'));
        } else {
            return view('cources.course_details', compact('course_details', 'course_trainers', 'lesson_data', 'related_courses', 'cats' ,'quizzes','introduction','course_ratings','user_rate','course'));
        }

    }

    public function join_course(Course $course)
    {
        if (Auth::user()->email_verified_at == null) {
            return redirect()
                ->route('course_details', $course->slug)
                ->withSuccess(__('You must verify your email first ,  Thanks!'));
        } else {
            Applicant::firstOrCreate([
                'user_id' => auth()->user()->id,
                'course_id' => $course->id,
            ],[
                    'user_id' => auth()->user()->id,
                    'course_id' => $course->id,
                ]);

    Mail::to(Auth::user()->email)->send(new JoinCourseMail($course));

            return redirect()
                ->route('course_details', $course->slug)
                ->withSuccess(__('You have applied for this course successfully ,  Thanks!'));
        }
    }

    public function course_payment(Course $course){
        

        \Session::put('course_id',$course->id);
        \Session::put('course_title',$course->title);
        \Session::put('course_price',$course->price);
        \Session::put('payment_type','course');
        
        return view('cources.payment',compact('course'));
    }

    public function quiz($slug)
    {
        $quiz =  Quiz::where('slug' , $slug)->whereIn('course_id' , auth()->user()->application->toQuery()->approved()->pluck('course_id'))->with('questions')->first();
        $score=QuizScore::where(['quiz_id' => $quiz->id, 'user_id' => auth()->id()])->first();
        return view('quiz' ,compact('quiz','score' ));
    }

    public function storeQuizAnswer(Request  $request)
    {
        $quiz_attempt = QuizAttempt::create([
            'quiz_id' => $request->quiz_id,
            'participant_id' => auth()->id(),
            'participant_type' => 'Student'
        ]);

        $validator = Validator::make($request->all(), [
            'answer'  => 'required',
            'quiz.*.answer'  => 'required',
        ]);

        if ($validator){


            $answers = [];
            for ($i = 1; $i <= count($request->question_id); $i++) {
                $answers[] = [
                    'quiz_attempt_id' => $quiz_attempt->id,
                    'quiz_question_id' => $request->question_id[$i],
                    'question_option_id' => $request->answer[$i]
                ];
            }
            QuizAttemptAnswer::insert($answers);


                $new_score=$quiz_attempt->caclculate_score(); //=2
                $score=QuizScore::where(['quiz_id' => $request->quiz_id, 'user_id' => auth()->id()])->first();

                if(!$score){
                    QuizScore::create(['quiz_id' => $request->quiz_id,
                        'user_id' => auth()->id(),
                        'score' => $new_score ]);
                }
        }

        else {
            \Session::flash('message', ['type' => 'error', 'text' => __('Do not leave question empty')]);
        }
        $result=$quiz_attempt->caclculate_score();

        return redirect(route('home'))->with("success","Your Quiz Score is " . $result);


    }

    public function addCourseToFav( Request $request)
    {
        $userWishlist = auth()->user()->favs->pluck('course_id')->toArray();
        if ($userWishlist && in_array($request->course_id, $userWishlist)) {

            \Session::flash('message', ['type' => 'error', 'text' => __('Course is already in your favourite list')]);
            return redirect()->back();
        }

        CourseFavourite::create([
            'user_id' => auth()->id(),
            'course_id' => $request->course_id
        ]);

        \Session::flash('message', ['type' => 'success', 'text' => __('Course added to your favourite list successfully')]);
        return redirect()->back();
    }


    public function favCourses()
    {
        $userWishlist = auth()->user()->favs;
        return view('dashboard.my_favs', compact('userWishlist'));
    }

    public function removeFromFav(Request $request)
    {
        $item = CourseFavourite::find($request->id);
        if ($item) {
            $item->delete();
            \Session::flash('message', ['type' => 'success', 'text' => __('Course deleted from your favourites successfully')]);
        }
        return redirect()->back();
    }

    public function update_rate(Course $course ,Request $request){

        CourseRating::updateOrCreate(
            [
            "user_id" => auth()->id(),
            "course_id"=>$request->course_id],
            [
            "rate"=>$request->rate,
            ]
        );
        \Session::flash('message' , ['type'=> 'success' , 'text' => __('Your rate submitted successfully')]);
        return redirect()->back();
    }
}
