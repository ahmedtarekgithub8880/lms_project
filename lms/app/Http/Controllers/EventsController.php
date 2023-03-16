<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventRecord;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Pagination\Paginator;
use TCG\Voyager\Traits\Spatial;

class EventsController extends Controller
{
   public function events(Request $request){


        $search = $request->get('search');
        if ($search){

            $events = Event::where('title' , 'like','%'.$search.'%')->paginate(9);
            $events->appends(['search' => $search]);
            if($events->isEmpty()){
                return view('not_found');
            }
        }
        else{
            $events  = Event::paginate(9);
        }

       return view('events.events' , compact('events'));
   }

   public function single_event(Event $event){

       $events = Event::all();
       return view('events.single-event' , compact('event' , 'events'));
   }


   public function store_event(EventRequest $request){

    $event=EventRecord::create($request->validated());
    \Session::flash('message' , ['type'=> 'success' , 'text' => __('Your have registered in  Event successfully')]);
    return redirect()->back();
}
}
