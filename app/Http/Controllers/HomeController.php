<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Recommends;
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
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

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
        if (Auth::check())
        {
            $recommends = new Recommends;
            $recommends->user_id = Auth::user()->id;
            $recommends->product_id = $id;

        }
        $product = Product::findOrFail($id);
        //dd($products->product_name);
        $reviews = DB::table('reviews')->get();

        return view('front/product_details', compact('product', 'reviews'));
    }

    public function wishlist(Request $request)
    {
       if (Auth::check())
       {
           $wishlist = new wishList;
           $wishlist->user_id = Auth::user()->id;
           $wishlist->product_id = $request->product_id;
           $wishlist->save();

           $products = DB::table('products')->where('id', '=', $request->user_id)->get();

           return redirect('/wishlist')->with(compact('products'));
       }
       else
       {
           return redirect('login')->with("msg", "Please Login First");
       }

    }

    public function view_wishlist()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;

            //dd($userId);

            $products = DB::table('wishlist')
                ->leftJoin('products', 'wishlist.product_id', '=', 'products.id')
                ->where('wishlist.user_id', '=', $userId)
                ->get();

            return view('front.wishlist', compact('products'));
        }
        else
        {
            return redirect('login')->with("msg", "Please Login First");
        }
    }

    public function remove_from_wishlist($id)
    {
        DB::table('wishlist')->where('product_id', '=', $id)->delete();
        $removed = 'Item Removed from Wishlist';

        return back()->with(compact('removed'));
    }

    public function addReview(Request $request)
    {
        $name = $request->clientName;
        $email = $request->clientEmail;
        $content = $request->reviewContent;

        DB::table('reviews')->insert([
            'client_name' => $name,
            'client_email' => $email,
            'review_content' => $content,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
            ]);

        return back();
    }

    public function search(Request $request)
    {
        $result = $request->search;
        $products = DB::table('products')->where('product_name', 'like', '%'.$result.'%')->paginate(2);

        if ($request == '')
            return view('front.shop');
        else
            return view('front.shop', ['msg' => 'Result: '.$result], compact('products'));

    }
}
