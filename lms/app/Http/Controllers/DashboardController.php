<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Course;
use App\Trainer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function instructor_dashboard(Trainer $trainer){


        $courses = Course::where('trainer_id', $trainer->id)->get();
        $students_count = Applicant::where([['course_id',$trainer->id ]])->get();

        $applicant = Applicant::where('course_id' , 1)->get();
        return view ('dashboard.instructor_dashboard' , compact('trainer','courses','students_count','applicant'));

    }
}
