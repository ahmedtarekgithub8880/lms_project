<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Applicant;
use App\Assignment;
use App\Group;
use App\Http\Requests\AssignmentRequest;
use App\Lesson;
use App\Resolf;
use App\Video;
use App\Resource;
use App\Meeting;

class LessonController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function lesson(Lesson $lesson,Course $course){
        
            $applicant=Applicant::where('course_id',$course->id)->where('approve','1')->where('user_id',auth()->user()->id)->get();
            // if($applicant->isEmpty()){
            //     return redirect()->route('course_details', $course->id);
            // }
            $resources=Resource::where('lesson_id',$lesson->id)->get();
            $lessons=Lesson::where('course_id',$course->id)->where('id',$lesson->id)->get();
            $count = Lesson::where('course_id',$course->id)->get();
            $popular_courses = Course::where('price' , '!=' , 0 )->get();
            // $group=Group::where('course_id',$course->id)->where('id',$applicant->group_id)->fi
            $video = Video::where('lesson_id' , $lesson->id)->get();
            // return $video;
            $lesson_id = Lesson::find($lesson->id);
            // get previous user id
            $previous = Lesson::where('id', '<', $lesson_id->id)->where('course_id',$course->id)->max('id');
            // get next user id
            $next = Lesson::where('id', '>', $lesson_id->id)->where('course_id',$course->id)->min('id');

            $previous_slug=Lesson::where('id', $previous)->where('course_id',$course->id)->get('slug');
            $next_slug=Lesson::where('id', $next)->where('course_id',$course->id)->get('slug');

        $lesson_count = $count;

        $meeting=Meeting::where('lesson_id',$lesson->id)->first();
           
                if($meeting){
                    $last = explode('/', $meeting->join_url, 3);
                    $url  = $last[2];
                    $meetingid =  explode('/', $url, 3);
                    $meeting_id =  $meetingid[2];
                }else{
                    $meeting_id = Null;
                }


        
            return view('cources.lesson',compact('lessons','course' ,'count','popular_courses','video','resources','next','previous','lesson_count','previous_slug','next_slug','lesson','course','meeting_id'));

    }



    public function upload_resolve(Request $request,$assignment_id){
            
            return view('cources.upload-resolve')->with('assignment_id',$assignment_id);
    }

    public function store_resolve(AssignmentRequest $request){
    $data=$request->validated();

        $arr = array();
        if ($request->hasFile('file')) {

                $fileName = 'assignments/' . $request->file->getClientOriginalName();
              $request->file->move(public_path('../storage/app/public/assignments'), $fileName);
                array_push($arr ,
                    [
                    'download_link'=>$fileName,
                    'original_name'=>$request->file->getClientOriginalName()
                    ]);
        }

        $data['file']=json_encode($arr);
        $data=Resolf::create($data);
        
        \Session::flash('message' , ['type'=> 'success' , 'text' => __('Your Resolve Uploaded successfully')]);
        return redirect()->back();
    }
 }
