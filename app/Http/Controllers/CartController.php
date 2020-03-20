<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));
    }

    public function addItem($id)
    {
        $product = Product::find($id);

        Cart::add($product->product_name, $id, 1, $product->product_price);

        return back();
    }

    public function destroy($id)
    {
        //echo $id;
        Cart::remove($id);
        return back();
    }

    public function update(Request $request, $id)
    {
       Cart::update($id, $request->qty);
       return back();
    }
}
