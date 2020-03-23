<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\wishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        //dd($products);

        return view('front.home', compact(['categories', 'products']));
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();

        return view('front.shop', compact(['categories','products']));
    }

    public function product_details($id)
    {
        $product = Product::findOrFail($id);
        //$product = $products->product_name;
        //dd($products->product_name);
        return view('front/product_details', compact('product'));
    }

    public function wishlist(Request $request)
    {
        $wishlist = new wishList;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $request->product_id;
        $wishlist->save();

        $products = DB::table('products')->where('id', $request->user_id)->get();

        return view('front/product_details', compact('products'));

    }

    public function view_wishlist()
    {
        $products = DB::table('wishlist')->leftJoin('products', 'wishlist.product_id', '=', 'products.id')->get();

        return view('front.wishList', compact('products'));
    }

    public function remove_from_wishlist($id)
    {
        DB::table('wishlist')->where('product_id', '=', $id)->delete();

        return back()->with('msg', 'Item Removed from Wishlist');
    }

}
