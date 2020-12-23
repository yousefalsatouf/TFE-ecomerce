<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        //dd($cartItems);
        json_decode($cartItems);
        return view('cart.index', compact('cartItems'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);

        if(isset($request->newPrice))
            $price = $request->newPrice;
        else
            $price = $product->product_price;

        Cart::add($id, $product->product_name, 1, $price, 1, ['img' => $product->image, 'stock' => $product->stock]);

        if (Auth::check())
        {
            DB::table('recommends')
                ->updateOrInsert(
                    ['user_id' => Auth::user()->id],
                    ['product_id' => $id]
                );

            DB::table('wishlist')
                ->where([
                    ['user_id', '=', Auth::user()->id],
                    ['product_id', '=', $id]
                ])->delete();
        }

        return redirect('/cart');
    }

    public function removeItem(Request $request)
    {
        $id = $request->id;
        Cart::remove($id);

        $cartItems = Cart::content();
        $tax = Cart::tax();
        $sum = Cart::total();
        $size = Cart::count();

        return response()->json([
            "cartItems" => $cartItems,
            "tax" => $tax,
            "sum" => $sum,
            "size" => $size,
        ]);
    }

    public function updateItem(Request $request)
    {
        if($request->qty <= 0)
        {
            Cart::remove($request->id);
        }else 
        {
            Cart::update($request->id, $request->qty);
        }
        $cartItems = Cart::content();
        $tax = Cart::tax();
        $sum = Cart::total();
        $size = Cart::count();

        return response()->json([
            "cartItems" => $cartItems,
            "tax" => $tax,
            "sum" => $sum,
            "size" => $size,
        ]);
    }
}
