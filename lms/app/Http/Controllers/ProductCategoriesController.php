<?php

namespace App\Http\Controllers;

use App\PCategory;
use App\Product;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    public function shop(PCategory $pcategory = null)
    {
        if ($pcategory){
            $products = Product::where('p_category_id' , $pcategory->id)->get();
        }
        else{
            $products = Product::all();
        }

        return view('shop.products' , compact('products'));
    }


    public function filterShop(Request  $request)
    {

        $products = Product::query();
        if ($request->search){
            $products->where('name' , 'like' , '%' . $request->search .'%');
        }
        if ($request->p_category_id){
            $products->whereIn('p_category_id' , $request->p_category_id);
        }

        if ($request->min_price){
            $products->where('price' , '>=', $request->min_price);
        }

        if ($request->max_price){
            $products->where('price' , '<=', $request->max_price);
        }

        $products = $products->get();

        return view('shop.products' , compact('products'));
    }

    

}
