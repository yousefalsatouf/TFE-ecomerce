<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index()
    {
        //
        $ads = Ads::all();

        return view('front/shop', compact('ads'));
    }
    public function advancedSearch(Request $request)
    {
        $category = $request->category;
        $maxPrice = $request->maxPrice;
        $onSold = $request->onSold;

        //dd($onSale);
       if ($category && $maxPrice && $onSold)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('products.product_price', '<', $maxPrice)
               ->where('categories.name', 'like', '%'.$category.'%')
               ->whereNotNull('sale_price')
               ->get();
       elseif ($category)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('categories.name', 'like', '%'.$category.'%')
               ->get();
       elseif ($maxPrice)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('products.product_price', '<', $maxPrice)
               ->get();
       elseif ($onSold)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->whereNotNull('sale_price')
               ->get();
       else
           $products = Product::all();

        return view('front/shop', compact('products'));
    }
}
