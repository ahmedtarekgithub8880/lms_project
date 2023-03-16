<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\SubscribeRequest;
use App\Newsletter;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function get_contact(){
        return view('contact');
    }

    public function store_contact(ContactRequest $request){

        $contact=Contact::create($request->validated());
        \Session::flash('message' , ['type'=> 'success' , 'text' => __('Your message sent successfully')]);
        return redirect()->back();
    }


    public function saveSubscribe(SubscribeRequest $request){

        Newsletter::create($request->validated());
        \Session::flash('message' , ['type'=> 'success' , 'text' => __('Your email sent successfully')]);
        return redirect()->back();
    }



}
