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
        $user_data = DB::table('users')->where('id', '=', $user_id)->orderby('id', 'DESC')->get();

        if (Auth::check())
            return view('user.index', compact('user_data'));
        else
            return redirect('/login');
    }
    // auth profile
    public function getAuth()
    {
        $auth = Auth::user();

        return response()->json($auth);
    }
    // auth update profile
    public function updateProfile(Request $request)
    {
        //$image= $request->file('image')->store('image');

        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->username,
                'state'=> $request->state, 
                'city'=> $request->city, 
                'email'=> $request->email,
                'first_name'=> $request->fname, 
                'last_name'=> $request->lname, 
                'postal_code'=> $request->code,
                'about'=> $request->about,
            ]);

        $user=  Auth::user();
            
        return response()->json($user);
    }
    public function orders()
    {
        $user_id = Auth::user()->id;
        // $orders=Orders_products::all();
        $orders = DB::table('orders_product')
            ->leftJoin('products', 'products.id', '=', 'orders_product.product_id')
            ->leftJoin('orders', 'orders.id', '=', 'orders_product.orders_id')
            ->where('orders.user_id', '=', $user_id)
            ->get();

        return view('user.orders', compact('orders'));
    }

    public function infos()
    {
        $userId = Auth::user()->id;
        $users = DB::table('users')->where('id', '=', $userId)->get();
        //dd($user);

        return view('user.infos', compact('users'));
    }

    public function updateInfos(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required|min:3|max:35',
            'first_name' => 'required|min:3|max:35',
            'last_name' => 'required|min:3|max:35',
            'email' => 'required|email',
            'phone_number' => 'required|numeric|min:9',
            'state' => 'required|min:3|max:35',
            'city' => 'required|min:3|max:25',
            'postal_code' => 'required|numeric',
            'street' => 'required|min:5|max:25',
            'street_number' => 'required|numeric',
            'payment_type' => 'required',
        ]);

        $userId = Auth::user()->id;
        DB::table('users')
            ->where('id', $userId)
            ->update($request->except('_token'));

        $image = $request->image;

        //dd($image);
        if($image)
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;

            DB::table('users')->where('id', $userId)->update(['image' => $imageName]);

        return back()->with('msg','Your Infos have been updated');
    }


    public function password()
    {
        return view('user.password');
    }

    public function updatePassword(Request $request)
    {
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;

        if(!Hash::check($oldPassword, Auth::user()->password))
            return back()->with('error','The specified password does not match the database password');

        else
            $request->user()->fill(['password' => Hash::make($newPassword)])->save();
            return back()->with('msg','Password has been updated');
    }
}
