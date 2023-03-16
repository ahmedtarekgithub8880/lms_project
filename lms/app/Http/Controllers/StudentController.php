<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Redirector;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use League\Flysystem\Util;
use TCG\Voyager\Facades\Voyager;
class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function profile()
    {
        $user_id = auth()->user()->id;

        $user_data = User::where('id', $user_id)->get();
        $user_courses = Applicant::where([['user_id', $user_id], ['approve', '1']])->get();
        $user_applaycourses = Applicant::where([['user_id', $user_id], ['approve', '0']])->get();
        $user = Auth::user();

        return view('student.profile', compact('user_data', 'user_courses', 'user', 'user_applaycourses'));
    }

    public function courses()
    {
        $user_id = auth()->user()->id;

        $user_data = User::where('id', $user_id)->get();
        $user_courses = Applicant::where([['user_id', $user_id]])->get();

        $user_applaycourses = Applicant::where([['user_id', $user_id], ['approve', '0']])->get();
        $user = Auth::user();

        return view('dashboard.my_courses', compact('user_data', 'user_courses', 'user', 'user_applaycourses'));
    }


    public function kids_Details()
    {
        $user_id = auth()->id();
        
        $user_kids = User::where('parent_id', $user_id)->with(['certificate'=> function($q) {
            $q->with('Course');
        },'quiz_score'=> function($q) {
            $q->with('quiz');
        },
        'applicant' => function($q) {
            $q->with('Course')->where('approve',1); 
        }
        ])->get();
        
        
        


        return view('dashboard.my_kids', compact('user_kids'));
    }



    public function update_password(User $user)
    {
        $this->validate(request(), [
            'password' => 'required|min:6|confirmed',
        ]);

        $user->password = bcrypt(request('password'));

        $user->save();
        \Session::flash('message', ['type' => 'success', 'text' => 'Updated Successfully']);

        return redirect()->route('my_dashboard');
    }

    public function update(User $user)
    {
        if (request('avatar') != null) {
            $this->validate(request(), [
                'avatar' => ['image'],
            ]);
            $fullFilename = null;
            $resizeWidth = 1800;
            $resizeHeight = null;
            $file = request('avatar');

            $path = 'users' . '/' . date('F') . date('Y') . '/';

            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
            $filename_counter = 1;

            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
                $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string) $filename_counter++;
            }
            $fullPath = $path . $filename . '.' . $file->getClientOriginalExtension();

            $ext = $file->guessClientExtension();

            if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
                $image = Image::make($file)->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                if ($ext !== 'gif') {
                    $image->orientate();
                }
                $image->encode($file->getClientOriginalExtension(), 75);

                // move uploaded file from temp to uploads directory
                if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                    $status = __('voyager::media.success_uploading');
                    $fullFilename = $fullPath;
                } else {
                    $status = __('voyager::media.error_uploading');
                }
            } else {
                $status = __('voyager::media.uploading_wrong_type');
            }
        } else {
            $fullFilename = request('avatar');
        }

        if (Auth::user()->email == request('email')) {
            $this->validate(request(), [
                'name' => 'required',
                'telephone' => '',
                  'email' => 'required|email|unique:users',
                //                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->telephone = request('telephone');

            if ($fullFilename != null) {
                $user->avatar = $fullFilename;
            }
            // $user->email = request('email');
            //            $user->password = bcrypt(request('password'));

            $user->save();
            \Session::flash('message', ['type' => 'success', 'text' => 'Updated Successfully']);

            return redirect()->route('my_dashboard');
        } else {
            $this->validate(request(), [
                'name' => 'required',
                
                'email' => 'required|email|unique:users',

                //                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->telephone = request('telephone');
            //            $user->password = bcrypt(request('password'));
            if ($fullFilename != null) {
                $user->avatar = $fullFilename;
            }
            $user->save();

            \Session::flash('message', ['type' => 'success', 'text' => __('Updated Successfully')]);

            return redirect()->route('my_dashboard');
        }
    }
}
