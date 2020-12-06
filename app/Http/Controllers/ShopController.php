<?php

namespace App\Http\Controllers;

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

    public function search(Request $request)
    {
        $result = $request->value;
        $products = DB::table('products')->where('product_name', 'like', '%'.$result.'%')->get();

        if ($result)
            return response()->json([ 'products' => $products ]);
    }

    public function advancedSearch(Request $request)
    {
        $all = $request->category;
        $category = $request->category;
        $price = $request->price;
        $onSold = $request->onSold;
        $new = $request->new;

        switch (TRUE)
        {
            case($all == 'all' || $category) && $price && $promo && $new:
                $products = DB::table('categories')
                ->leftJoin('products', 'products.category_id', '=', 'categories.id')
                ->where('categories.name', 'like', '%'.$category.'%')
                ->Where('product_price', '<=', $price)
                ->whereNotNull('sold_price')
                ->whereNotNull('new_arrival')
                ->get();
                break;
            case $all == 'all':
                $products = Product::paginate(6);
            break;
            case $category:
                $products = DB::table('categories')
                    ->leftJoin('products', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->get();
                break;
            case $price:
                $products = DB::table('products')
                    ->Where('product_price', '<=', $price)
                    ->get();
                break;
            case $onSold:
                $products = DB::table('products')
                    ->whereNotNull('sold_price')
                    ->get();
                break;
            case $new:
                $products = DB::table('products')
                    ->whereNotNull('new_arrival')
                    ->get();
                break;
            default:
                $products = Product::paginate(6);
        }
            
        return response()->json(['products' => $products ]);
    }
}
