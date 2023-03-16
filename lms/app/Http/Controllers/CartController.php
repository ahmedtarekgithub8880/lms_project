<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function addToCart($product_id, $qty)
    {
        //check if user logged in
        if (Auth::user()) {
            //true
            //use auth->user->id
            $user_id = Auth::user()->id;
            //check if the product added to cart before or not
            $cart_item = CartItem::where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->first();
        } else {//false
            return false;
        }

        if (isset($cart_item)) {
            // update qty
            $cart_item->qty = $cart_item->qty + $qty;
            $cart_item->save();
        } else {
            //insert in cart items
            $cart_item = new CartItem();
            $cart_item->product_id = $product_id;
            if (Auth::user()) {
                $cart_item->user_id = Auth::user()->id;
            }
            $cart_item->qty = $qty;
            $cart_item->save();
        }

        return true;
    }

    /**
     * return true or false
     * check the qty of product
     */
    public function checkQty($product, $qty)

    {

        $cart_item = CartItem::where('product_id', $product->id)
            ->where('user_id', \Auth::user()->id)
            ->first();
        $new_qty = $qty;
        if ($cart_item) {
            $new_qty += $cart_item->qty;
        }

        if ($product->qty < $new_qty) {
            return false;
        } else {
            return true;
        }
    }


    //change item qty
    public function changeItemQty($item_id, $op)
    {
        $cart_item = CartItem::findOrFail($item_id);

        if ($op == 'add') {
            $new_qty = $cart_item->qty++;
        } else {
            $new_qty = $cart_item->qty--;
        }

        if ($cart_item->save()) {
            return true;
        }

        return false;

    }

    public function addOneItemtoCart($product_id)
    {
        $cart_item = CartItem::where('product_id', $product_id)
            ->where('user_id', \Auth::user()->id)
            ->first();

        if ($cart_item) {
            $new_qty = $cart_item->qty + 1;
            if ($cart_item->product->qty < $new_qty) {
                \Session::flash('message', ['type' => 'error', 'text' => __('Out of Stock')]);
                return redirect()->back();
            }
            else {
                $this->addToCart($product_id, 1);
                \Session::flash('message', ['type' => 'success', 'text' => __('Product Added successfully to your cart')]);
                return redirect()->back();
            }
        } else {
            $this->addToCart($product_id, 1);
            \Session::flash('message', ['type' => 'success', 'text' => __('Product Added successfully to your cart')]);
            return redirect()->back();
        }


    }

    public function cartItems()
    {
        $cart_items = $this->getCartItems();
        return view('cart', compact('cart_items'));
    }

    public function mycartItems()
    {
        $cart_items = $this->getCartItems();
        return view('dashboard.my_cart', compact('cart_items'));
    }

    public function getCartItems()
    {
        $cart_items = [];
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $cart_items = CartItem::with('product')->where('user_id', $user_id)
                ->get();
        }

        return $cart_items;
    }

    public function removeItemFromCart(Request $request)
    {
        $item = CartItem::find($request->item_id)->delete();
        if ($item) {
            \Session::flash('message', ['type' => 'success', 'text' => __('Product removed from cart Successfully')]);
            return redirect()->back();
        } else {
            \Session::flash('message', ['type' => 'error', 'text' => __('Something went wrong')]);
            return redirect()->back();
        }

    }

    public function emptyCart()
    {
        $cart_items = CartItem::with('product')->where('user_id', auth()->id())->delete();
        \Session::flash('message', ['type' => 'success', 'text' => __('All products removed from cart Successfully')]);
        return redirect()->back();

    }

    public function updateCartQty(Request $request)
    {
        $item_id = $request->item_id;
        $product_id = $request->product_id;
        $product = Product::findOrFail($product_id);
        $qty = $request->qty;
        $cart_item = CartItem::where('id', $item_id)->first();

        if ($product->qty < $qty) {

            \Session::flash('message', ['type' => 'error', 'text' => __('Wrong Quantity')]);
            return redirect()->back();
        } else {
            $validator = Validator::make($request->all(), [
                'qty' => 'numeric|min:1',
            ]);
            if ($validator->fails()) {
                \Session::flash('message', ['type' => 'error', 'text' => __('Wrong Quantity input')]);
                return redirect()->back();
            }
            $cart_item->update([
                'qty' => $qty
            ]);
            \Session::flash('message', ['type' => 'success', 'text' => __('Quantity updated Successfully')]);
            return redirect()->back();
        }
    }
}
