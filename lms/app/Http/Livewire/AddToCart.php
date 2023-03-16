<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CartController;
use Livewire\Component;


class AddToCart extends Component
{


    public $product ;
    public $qty = 1;
    public $price;



    public function mount($product)
    {
//        $this->product = json_decode(json_encode($product),true);
        $this->product = $product;
        $this->qty = 1;
        $this->price = $product->price;


    }


    public function checkQty($qty)
    {
        $product = $this->product;

        if($product->qty < $qty){
            return false;
        }else {
            return true;
        }
    }


    public function addTocart($product_id)
    {
        if(!\Auth::user()){
            return $this->alertError(__('Sorry, You have to login first'));

        }

        $qty = $this->qty;
        $cart_item = new CartController();

        if (!$cart_item->checkQty($this->product, $this->qty)) {
            $this->alertError(__('This Quantity not available'));
        }else{

            $item = $cart_item->addToCart($product_id,$qty??1);


            if ($item) {
                $this->alertSuccess(__('Product Added to your Cart Successfully'));
            }else{
                $this->alertError();
            }

        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertSuccess($message)
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => $message]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertError($message = 'Something is Wrong!')
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'error',  'message' => $message]);
    }

    public function plus()
    {
        $this->qty++;
    }

    public function minus()
    {
        (($this->qty-1) <=0) ? $this->qty=1:$this->qty-- ;
    }

    public function alertInfo()
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'info',  'message' => 'Going Well!']);
    }


    public function render()
    {

        if($this->qty != null){
            (($this->qty) <0) ? $this->qty=1:$this->qty;

        }
        $this->price =  ($this->qty > 0 )  ? $this->qty * $this->product['price'] : 0;
        return view('livewire.add-to-cart' );
    }
}
