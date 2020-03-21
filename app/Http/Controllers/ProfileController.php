<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check())
            return view('user.index');
        else
            return redirect('/login');
    }

    public function orders()
    {
        $user_id = Auth::user()->id;
        // $orders=Orders_products::all();
        $orders = DB::table('orders_product')->leftJoin('products', 'products.id', '=', 'orders_product.product_id')->leftJoin('orders', 'orders.id', '=', 'orders_product.orders_id')->where('orders.user_id', '=', $user_id)->get();
        return view('user.orders', compact('orders'));
    }

    public function address()
    {
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();

        return view('/address', compact('address_data'));
    }
}
