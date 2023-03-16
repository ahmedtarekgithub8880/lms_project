<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\OrderItem;
use App\Product;
use Illuminate\Http\Request;
use Mail;
use App\Mail\PurchaseOrderMail;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function checkout()
    {
        $cart_items = auth()->user()->items;

        return view('checkout', compact('cart_items'));
    }



    public function uploadProductQty($product_id , $qty)
    {
     $product =   Product::where('id' ,$product_id)->first();
     if ($product){
         $product->update(['qty'=> $product->qty - $qty]);
         return true;
     }
        return false;
    }

    public function saveOrder(OrderRequest $request)
    {
        $total_price = auth()->user()->items->sum('final_price');
        $cart_items = auth()->user()->items;

        $validator = $request->safe()->merge([
            'user_id' => auth()->id(),
            'total_price' => $total_price
        ])->toArray();

        $order = Order::create($validator);
        
        foreach ($cart_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_price' => $item->product->price,
                'product_qty' => $item->qty,
                'product_total' => $item->final_price
            ]);
            $this->uploadProductQty($item->product_id  , $item->qty);

        }


        CartItem::where('user_id', auth()->id())->delete();


        if($request->payment_type == 0){
             Mail::to(Auth::user()->email)->send(new PurchaseOrderMail($order));
            \Session::flash('message', ['type' => 'success', 'text' => __('Order Submitted successfully')]);
            return redirect()->route('myDashboardOrders');
        }else{
            
            \Session::put('order_id',$order->id);
            \Session::put('order_price',$total_price);
            \Session::put('payment_type','order');

            return redirect()->route('payment.create');
        }
    }


    public function myDashboardOrders()
    {
        $orders = auth()->user()->orders ;
        

        return view('dashboard.my_orders' , compact('orders'));

    }

}
