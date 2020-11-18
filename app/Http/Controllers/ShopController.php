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
            $data = Product::paginate(9);
            return response()->json($data);
    }

    public function adds()
    {
        $ads = Ads::all();
        return view('front/shop', compact('ads'));
    }

    public function advancedSearch(Request $request)
    {
        $category = $request->category;
        $maxPrice = $request->maxPrice;
        $onSold = $request->onSold;
        $newProd = $request->newProd;
        $topProd = $request->topProd;
        //dd($onSold);
        $categories = Category::all();

        $ads = Ads::all();
        $recommends = DB::table('recommends')
            ->leftJoin('products', 'products.id', '=', 'recommends.product_id')
            ->take(5)
            ->get();

        switch (true)
        {
            case $category:
                $searchProducts = DB::table('categories')
                    ->leftJoin('products', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->get();
                break;
            case $maxPrice:
                $searchProducts = DB::table('products')
                    ->Where('sold_price', '<=', $maxPrice)
                    ->orWhere('product_price', '<=', $maxPrice)
                    ->get();
                break;
            case $onSold:
                $searchProducts = DB::table('products')
                    ->whereNotNull('sold_price')
                    ->get();
                //dd($products);
                break;
            case $newProd:
                $searchProducts = DB::table('products')
                    ->whereNotNull('new_arrival')
                    ->get();
                break;
            case $topProd:
                $searchProducts = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->where('rating', '>=', 4)
                    ->get();
                break;
            case $category || $maxPrice || $onSold || $newProd || $topProd:
                $searchProducts = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->rightJoin('reviews', 'products.id', '=', 'reviews.id')
                    ->where('products.product_price', '<=', $maxPrice)
                    ->whereNotNull('sold_price')
                    ->whereNotNull('new_arrival')
                    ->where('rating', '>=', 4)
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->get();
                break;
            default:
                $searchProducts = Product::all();

        }
        //print_r($products);
        // die();
        //return redirect('shop')->with(['products', 'ads', 'recommends']);
        return view('front/shop', compact('searchProducts', 'ads', 'recommends', 'categories'));
    }
}
