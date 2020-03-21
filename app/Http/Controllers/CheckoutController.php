<?php

namespace App\Http\Controllers;

use App\address;
use App\orders;
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
            'first_name' => 'required|min:5|max:35',
            'last_name' => 'required|min:5|max:35',
            'state' => 'required|min:5|max:35',
            'city' => 'required|min:5|max:25',
            'postal_code' => 'required|numeric',
            'street' => 'required|min:7|max:25',
            'street_number' => 'required|numeric',
        ]);
        //dd($request->all());
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $address = new address;

        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->street = $request->street;
        $address->street_number = $request->street_number;
        $address->payment_type = $request->pay;
        $address->user_id = $userId;
        $address->user_email = $userEmail;

        $address->save();

        orders::createOrder();
        Cart::destroy();
        return redirect('finish');
    }
}

