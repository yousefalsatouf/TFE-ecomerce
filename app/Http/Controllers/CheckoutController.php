<?php

namespace App\Http\Controllers;
use App\Events\SendBillEvent;
use App\Orders;
use App\User;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class   CheckoutController extends Controller
{
    //
    public function index()
    {
        $checkInfos = DB::table('users')->where('id', '=', Auth::user()->id)->pluck('first_name');

        //dd($checkInfos[0]);
        if ($checkInfos[0] === null){
            return back();
        }

        if (Auth::check())
        {
            $cartItems = json_decode(Cart::content());
            $amount = Cart::total();
            $price = Cart::subtotal();
            $tax = Cart::tax();

            return view('front/checkout', compact('cartItems', 'amount', 'price', 'tax'));
        }
        else
            return redirect('/login');
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

        $firstName = $request->first_name;
        $lastName = $request->last_name;
        $phoneNumber = $request->phone_number;
        $state = $request->state;
        $city = $request->city;
        $postal_code = $request->postal_code;
        $street = $request->street;
        $street_number = $request->street_number;
        $payment_type = $request->pay;

        DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'state' => $state,
                'city' => $city,
                'postal_code' => $postal_code,
                'street' => $street,
                'street_number' => $street_number,
                'payment_type' => $payment_type
                ]);

        return redirect('checkout')->with([]);
    }
    public function checkoutaddress()
    {
        $userId = Auth::user()->id;
        $addressInfos = DB::table('users')->where('id', $userId)->get();

        return view('front/checkoutAddress', compact('addressInfos'));
    }

    public function finishOrder()
    {
        // creating an order and destroy the cart ...
        $order = Orders::createOrder();
        Cart::destroy();
        $user = Auth::user();

        event(new SendBillEvent($user, $order));
        return response()->json($order);
    }
}

