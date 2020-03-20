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
            'fullname' => 'required|min:5|max:35',
            'pincode' => 'required|numeric',
            'city' => 'required|min:5|max:25',
            'state' => 'required|min:5|max:35',
            'country' => 'required']);
    }

}
