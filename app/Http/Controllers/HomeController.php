<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Products_properties;
use App\Recommends;
use App\Review;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('new_arrival', true)->take(4)->get();
        $categories = Category::all();

        return view('front.home', compact(['products', 'categories']));
    }

    public function shop()
    {
        $lastProducts = Product::all()->take(4);
        $products = Product::paginate(9);
        $recommends = DB::table('recommends')
            ->leftJoin('products', 'products.id', '=', 'recommends.product_id')
            ->take(4)
            ->get();

        return view('front.shop', compact(['lastProducts', 'recommends']));
    }

    public function product_details(Request $request, $id)
    {
        $wishlistData = null;
        $userId = null;
        $count = 0;
        $auth = null;
        
       
        if (Auth::check())
        {
            //wish list setup ...
            $auth = Auth::user()->id;
            $wishlistData = DB::table('wishlist')
                ->leftJoin('products', 'wishlist.product_id', '=', 'products.id')
                ->rightJoin('users','wishlist.user_id', '=', 'users.id')
                ->where('wishlist.user_id', '=', Auth::user()->id)
                ->where('wishlist.product_id', '=', $id)
                ->get();
            
            foreach ($wishlistData as $data)
                $userId = $data->user_id;
        }

        $product = Product::findOrFail($id);
        $productProp = DB::table('products_properties')->where('product_id', '=', $id)->get();
        $reviews = DB::table('reviews')
                            ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
                            ->select('reviews.*', 'users.image')
                            ->where('product_id', '=', $id)
                            ->get();
        
        //dd($reviews);
        $ratingSum = DB::table('reviews')->where('product_id', '=', $id)->whereNotNull('rating')->sum('rating');
        $ratingCount = DB::table('reviews')->where('product_id', '=', $id)->whereNotNull('rating')->pluck('rating')->count();

        // convert to json
        json_decode($reviews);
        //dd($reviews);
        if ($ratingSum == 0 || $ratingCount == 0)
            $rated = null;
        else
            $rated =  $ratingSum / $ratingCount;

        $images = DB::table('product_images')
            ->where('product_id', '=', $id)
            ->get();

       // $test = Review::with('comments', 'user')->where('product_id', $product->id)->get();
        return view('front/product_details', compact('product','productProp', 'reviews', 'wishlistData', 'userId', 'images', 'count', 'rated', 'auth'));
    }

    public function wishlist(Request $request)
    {
       if (Auth::check())
       {
           $wishlist = new Wishlist();
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
        $productId = $request->prodID;
        $content = $request->content;
        $rating = $request->rating;
        $guestName = $request->name;
        $guestEmail = $request->email;

        if (Auth::check())
        {
            DB::table('reviews')->insert([
                'review_content' => $content,
                'rating' => $rating,
                'user_id' => Auth::user()->id,
                'product_id' => (int)$productId,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
            ]);
        }
        else
        {
            DB::table('reviews')->insert([
                'client_name' => $guestName,
                'client_email' => $guestEmail,
                'review_content' => $content,
                'rating' => $rating,
                'product_id' => $productId,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
            ]);
        }

        $reviews = DB::table('reviews')
        ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
        ->select('reviews.*', 'users.image')
        ->where('product_id', '=', $request->prodID)
        ->get();

        return response()->json($reviews);
    }

    public function removeReview(Request $request)
    {
        DB::table('reviews')->where('id', $request->id)->delete();
        $reviews = DB::table('reviews')
        ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
        ->select('reviews.*', 'users.image')
        ->where('product_id', '=', $request->prodID)
        ->get();
        
        return response()->json($reviews);
    }
}
