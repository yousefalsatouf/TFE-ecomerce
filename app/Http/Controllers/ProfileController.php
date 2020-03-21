<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $address_data = DB::table('address')->where('user_id', '=', $user_id)->orderby('id', 'DESC')->get();

        if (Auth::check())
            return view('user.index', compact('address_data'));
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

        return view('user.address', compact('address_data'));
    }

    public function updateAddress(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            //'email' => 'required|email',
            //'phone' => 'required|numeric|min:9|max:13',
            'state' => 'required|min:3|max:35',
            'city' => 'required|min:3|max:25',
            'postal_code' => 'required|numeric',
            'street' => 'required|min:5|max:25',
            'street_number' => 'required|numeric',
        ]);

        $userid = Auth::user()->id;
        DB::table('address')->where('user_id', $userid)->update($request->except('_token'));

        return back()->with('msg','Your address has been updated');
    }

    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        if(!Hash::check($oldPassword, Auth::user()->password)){
            return back()->with('msg','The specified password does not match the database password');

        }else{
            $request->user()->fill(['password' => Hash::make($newPassword)])->save();
            return back()->with('msg','Password has been updated');
        }
    }
}
