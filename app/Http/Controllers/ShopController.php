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
        $newProd = $request->newProd;
        $topProd = $request->topProd;

        $categories = Category::all();

        $ads = Ads::all();
        $recommends = DB::table('recommends')
            ->leftJoin('products', 'products.id', '=', 'recommends.product_id')
            ->take(5)
            ->get();

        switch (true)
        {
            case $category:
                $products = DB::table('categories')
                    ->leftJoin('products', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->paginate(12);
                break;
            case $maxPrice:
                $products = DB::table('products')
                    ->Where('sold_price', '<=', $maxPrice)
                    ->where('product_price', '<=', $maxPrice)
                    ->paginate(12);
                break;
            case $onSold:
                $products = DB::table('products')
                    ->whereNotNull('sold_price')
                    ->paginate(12);
                break;
            case $newProd:
                $products = DB::table('products')
                    ->whereNotNull('new_arrival')
                    ->paginate(12);
                break;
            case $topProd:
                $products = DB::table('products')
                    ->leftJoin('reviews', 'products.id', '=', 'reviews.product_id')
                    ->where('rating', '>=', 4)
                    ->paginate(12);
                break;
            case $category || $maxPrice || $onSold || $newProd || $topProd:
                $products = DB::table('products')
                    ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->rightJoin('reviews', 'products.id', '=', 'reviews.id')
                    ->where('products.product_price', '<=', $maxPrice)
                    ->whereNotNull('sold_price')
                    ->whereNotNull('new_arrival')
                    ->where('rating', '>=', 4)
                    ->where('categories.name', 'like', '%'.$category.'%')
                    ->paginate(12);
                break;
            default:
                $products = Product::paginate(12);

        }
        //print_r($products);
        // die();
        //return redirect('shop')->with(['products', 'ads', 'recommends']);
        return view('front/shop', compact('products', 'ads', 'recommends', 'categories'));
    }
}
