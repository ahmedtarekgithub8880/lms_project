<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Http\Resources\OrderItemResuorce;
use App\Order;
use App\Course;
use App\OrderItem;
use App\Payment;
use Illuminate\Http\Request;
use App\Services\Payments\Thawani;
use Exception;
use Illuminate\Contracts\Session\Session;
use Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\PurchaseOrderMail;
use App\Mail\JoinCourseMail;
use App\Mail\PurchaseCourseMail;

class PaymentController extends Controller
{
    public function create (Request $request){
// dd($course);
        
        $order_id =  \Session::get('order_id'); 
        $order_price = \Session::get('order_price'); 

        $course_id = \Session::get('course_id'); 
        $course_price = \Session::get('course_price'); 
        $course_title = \Session::get('course_title'); 
        $payment_type = \Session::get('payment_type'); 
        
        $session_id =  \Session::get('session_id'); 

        $client= new Thawani(
            config('services.thawani.secret_key'),
            config('services.thawani.publishable_key'),
            'test'
        );

        $course=Course::where('id',$course_id)->first();
        if($payment_type =="course"){
        $data=[
            'client_refrence_id'=>$session_id,
            'mode'=>'payment',
            'products'=>[
                [
                'name'=>substr($course_title ,0,39),
                'unit_amount'=>$course_price*100,
                'quantity'=>1,
            ],
            ],

            'success_url'=>route('payment.success'),
            'cancel_url'=>route('payment.cancel'),
            
            ];
        }elseif($payment_type =="order"){
             
        $order=OrderItem::where('order_id',$order_id)->with('product')->get();

        $result=[];
        foreach($order as $or){

            $result [] =[                
                    'name'=>substr($or->product->name ,0,39),
                    'unit_amount'=>$or->product_price*100,
                    'quantity'=>$or->product_qty,
            ];
        }
            $data=[
                'client_refrence_id'=>$session_id,
                'mode'=>'payment',
                 'products'=>$result,
                'success_url'=>route('payment.success'),
                'cancel_url'=>route('payment.cancel')            
            ];
            
        }else{
            return redirect()->back();
        }
            try{
        $session_id = $client->createCheckoutSession($data);
        

        if(\Session::get('payment_type') == "course"){
            $applicant=Applicant::firstOrCreate(
                ['user_id'=>auth()->id(),
                'course_id'=>$course_id,
                ],[
                'user_id'=>auth()->id(),
                'course_id'=>$course_id,
                'price'=>$course_price
            ]);

            $payment=Payment::forceCreate([
            'user_id'=>auth()->id(),
            'gateway'=>'thawani',
            'reference_id'=>$session_id,
            'amount'=>$course_price,
            "status"=>"pending",
            "payment_type"=>$payment_type,
            "order_id"=>$applicant->id,
            
        ]);

        Mail::to(Auth::user()->email)->send(new PurchaseCourseMail($course));
    }elseif(\Session::get('payment_type') == "order"){
        
        $payment=Payment::forceCreate([
            'user_id'=>auth()->id(),
            'gateway'=>'thawani',
            'reference_id'=>$session_id,
            'amount'=>$order_price*100,
            "status"=>"pending",
            "payment_type"=>$payment_type,
            "order_id"=>$order_id       
        ]);

        Mail::to(Auth::user()->email)->send(new PurchaseOrderMail($order));
    }else{
        \Session::flash('message', ['type' => 'success', 'text' =>"Payment Type Not Selected yet"]);
        return redirect()->back();
    }
        \Session::put('payment_id',$payment->id);
        \Session::put('session_id',$session_id);
        
        
        return redirect()->away($client->getPayUrl($session_id));
            }catch(Exception $e){
                
                dd($e->getMessage());

                // return redirect()->route('payment.cancel');
            }
    }

    
}
