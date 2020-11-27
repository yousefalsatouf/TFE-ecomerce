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
        // pagination with api vue js
            $products = Product::paginate(6);
            $catsNames = Category::all();

            return response()->json([
                'products' => $products,
                'catsNames' => $catsNames,
            ]);
    }

    public function advancedSearch(Request $request)
    {
        $all = $request->value;
        $category = $request->value;
        $maxPrice = $request->price;
        $onSold = $request->onSold;

        switch (true)
        {
            case $all == 'all':
                $products = $products = Product::all();
            break;
            case $category:
                $products = DB::table('categories')
                    ->leftJoin('products', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->get();
                break;
            case $maxPrice:
                $products = DB::table('products')
                    ->Where('sold_price', '<=', $maxPrice)
                    ->orWhere('product_price', '<=', $maxPrice)
                    ->get();
                break;
            case $onSold:
                $products = DB::table('products')
                    ->whereNotNull('sold_price')
                    ->get();
                //dd($products);
                break;
            default:
                $products = Product::all();

        }

        //dd($products);
       
        return response()->json([
            'products' => $products
        ]);
    }
}
