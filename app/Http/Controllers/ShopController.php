<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function advancedSearch(Request $request)
    {
        $categories = Category::all();

        $category = $request->category;
        $maxPrice = $request->maxPrice;

        //dd($onSale);
       if ($category && $maxPrice)
           $products = DB::table('products')->leftJoin('categories', 'products.category_id', '=', 'categories.id')->where('products.product_price', '<', $maxPrice)->where('categories.name', 'like', '%'.$category.'%')->get();
       elseif ($category)
           $products = DB::table('products')->leftJoin('categories', 'products.category_id', '=', 'categories.id')->where('categories.name', 'like', '%'.$category.'%')->get();
       elseif ($maxPrice)
           $products = DB::table('products')->leftJoin('categories', 'products.category_id', '=', 'categories.id')->where('products.product_price', '<', $maxPrice)->get();
       else
           $products = Product::all();

        return view('front/shop', compact(['categories', 'products']));
    }
}
