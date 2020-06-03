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

        $ads = Ads::all();
        $recommends = DB::table('recommends')
            ->leftJoin('products', 'products.id', '=', 'recommends.product_id')
            ->take(5)
            ->get();
        //dd($onSale);
       if ($category && $maxPrice && $onSold)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('products.product_price', '<', $maxPrice)
               ->where('categories.name', 'like', '%'.$category.'%')
               ->whereNotNull('sale_price')
               ->paginate(12);
       elseif ($category)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('categories.name', 'like', '%'.$category.'%')
               ->paginate(12);
       elseif ($maxPrice)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->where('products.product_price', '<', $maxPrice)
               ->paginate(12);
       elseif ($onSold)
           $products = DB::table('products')
               ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
               ->whereNotNull('sale_price')
               ->paginate(12);
       else
           $products = Product::paginate(12);

        return view('front/shop', compact('products', 'ads', 'recommends'));
    }
}
