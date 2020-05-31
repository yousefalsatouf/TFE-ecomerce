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
        return view('cart.index', compact('cartItems'));
    }

    public function addItem(Request $request, $id)
    {
        $product = Product::find($id);

        if (Auth::check())
            DB::table('recommends')
                ->updateOrInsert(
                    ['user_id' => Auth::user()->id],
                    ['product_id' => $id]
                );

        if(isset($request->newPrice))
            $price = $request->newPrice;
        else
            $price = $product->product_price;

        Cart::add($id, $product->product_name, 1, $price, 1, ['img' => $product->image, 'stock' => $product->stock]);

        return redirect('/cart');
    }

    public function removeItem($id)
    {
        //echo $id;
        Cart::remove($id);
        return back();
    }

    public function updateItem(Request $request, $id)
    {
        $msg = 'Quantity is updated successfully';
        Cart::update($id, $request->qty);

        return back()->with('status', $msg);
    }
}
