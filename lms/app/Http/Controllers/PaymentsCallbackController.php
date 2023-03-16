<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Services\Payments\Thawani;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentsCallbackController extends Controller
{
    public function success(){
        $payment_id = \Session::get('payment_id');
        $session_id = \Session::get('session_id');
        
        if(!$payment_id && !$session_id ){
            abort(404);
        }

        $payment=Payment::findOrFail($payment_id);
        
        if($payment->reference_id !== $session_id ){
            
            abort (404);
        }

           $client= new Thawani(
            config('services.thawani.secret_key'),
            config('services.thawani.publishable_key'),
            'test'
        );
        try{
            
        $response=$client->getCheckoutSession($session_id);
        
        
        if($response['data']['payment_status'] == 'paid'){
            $payment->status='paid';
            $payment->data=$response;
            $payment->save();
          //  dd('Success!');
            // return redirect()->route('payment.success');
            return view('payment.success');
        }
        }catch(Exception $e){
            
            dd($e->getMessage());
        }
    }
  

    public function cancel(){
        
        $payment_id = \Session::get('payment_id');
        $session_id = \Session::get('session_id');
        if(!$payment_id && !$session_id ){
            abort(404);
        }

        $payment=Payment::findOrFail($payment_id);
        if(!$payment->reference_id !== $session_id ){
            abort (404);
        }
        $payment->status='unpaid';
        $payment->save();
        dd('success');
    }
}
