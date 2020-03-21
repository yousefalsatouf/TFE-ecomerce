<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

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
        $products=Product::all();
        $categories=Category::all();

        return view('front.home');
    }

    public function home()
    {
        return view('home');
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
        return view('front/product_details', compact('product'));
    }

}
