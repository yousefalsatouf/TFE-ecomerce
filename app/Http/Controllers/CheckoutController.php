<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        if (Auth::check())
        {
            $cartItems = Cart::content();
            return view('front/checkout', compact('cartItems'));
        }
        else
        {
            return redirect('/login');
        }
    }

    public function formValidate(Request $request)
    {
        $this->validate($request, [
            'f-name' => 'required|min:5|max:35',
            'l-name' => 'required|min:5|max:35',
            'email' => 'required|email',
            'state' => 'required|min:5|max:35',
            'city' => 'required|min:5|max:25',
            'postal-code' => 'required|numeric',
            'street' => 'required|min:7|max:25',
            'street-n' => 'required|numeric',
        ]);

        dd($request->all());
    }

}
