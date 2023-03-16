<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function singleProduct(Product $product)
    {
        $data = [
            'product' => $product,
            'products' => Product::where([['p_category_id', $product->p_category_id], ['id', '!=', $product->id]])->get()
        ];

        return view('shop.single_product', $data);
    }

    public function addToWishlist(Request $request)
    {

        $userWishlist = auth()->user()->wishlist->pluck('product_id')->toArray();
        if ($userWishlist && in_array($request->product_id, $userWishlist)) {

            \Session::flash('message', ['type' => 'error', 'text' => __('Item is already in your wishlist')]);
            return redirect()->back();
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id
        ]);

        \Session::flash('message', ['type' => 'success', 'text' => __('Item added to your wishlist successfully')]);
        return redirect()->back();
    }

    public function wishlist()
    {
        $userWishlist = auth()->user()->wishlist;
        return view('wishlist', compact('userWishlist'));

    }


    public function dashboard_wishlist()
    {
        $userWishlist = auth()->user()->wishlist;
        return view('dashboard.my_wishlist', compact('userWishlist'));

    }

    public function removeFromCart(Request $request)
    {

        $item = Wishlist::find($request->id);
        if ($item) {
            $item->delete();
            \Session::flash('message', ['type' => 'success', 'text' => __('Item deleted from your wishlist successfully')]);
        }
        return redirect()->back();

    }

}
