<?php

namespace App\Http\Controllers;

use App\user_infos;
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
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            'phone_number' => 'required|numeric|min:9',
            'state' => 'required|min:3|max:35',
            'city' => 'required|min:3|max:25',
            'postal_code' => 'required|numeric',
            'street' => 'required|min:5|max:25',
            'street_number' => 'required|numeric',
        ]);
        //dd($request->all());
        $userId = Auth::user()->id;
        $userEmail = Auth::user()->email;

        $userInfos = new user_infos;

        $userInfos->first_name = $request->first_name;
        $userInfos->last_name = $request->last_name;
        $userInfos->phone_number = $request->phone_number;
        $userInfos->state = $request->state;
        $userInfos->city = $request->city;
        $userInfos->postal_code = $request->postal_code;
        $userInfos->street = $request->street;
        $userInfos->street_number = $request->street_number;
        $userInfos->payment_type = $request->pay;
        $userInfos->user_id = $userId;
        $userInfos->user_email = $userEmail;

        $userInfos->save();

        return back();
    }

    public function finishOrder()
    {
        orders::createOrder();
        Cart::destroy();

        return redirect('/finish');
    }
}

