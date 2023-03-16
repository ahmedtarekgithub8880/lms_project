<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View as View;
// use Illuminate\View\View;
use PDF;
class CertificateController extends Controller
{

    public function certificate(Certificate $data)
    {



        $result = [
            'name' => $data->name ,
            'course' => $data->course ,
            'course_date' => $data->course_date
        ];
      return view('certificate' , $result);


    }

    public function generate_certificate()
    {

      return view('sec-certificate');



    }
  }

