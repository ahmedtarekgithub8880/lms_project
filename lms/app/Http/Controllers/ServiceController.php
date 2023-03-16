<?php

namespace App\Http\Controllers;

use App\OurService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function services(Request $request)
    {

        $search = $request->get('search');
        if ($search){

            $services = OurService::where('title' , 'like','%'.$search.'%')->get();
        }
        else{

            $services = OurService::all();
        }


        return view('services.services' ,compact('services'));

    }
    public function single_service(OurService  $ourService)
    {

        $services = OurService::where('id', '!=' , $ourService->id)->latest()->take(10)->get();
        return view('services.single_service' ,compact('ourService' , 'services'));

    }
}
