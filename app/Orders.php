<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Orders extends Model
{
    //
    protected $fillable = ['total', 'status'];


    public function orderFields()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public static function createOrder()
    {
        $user = Auth::user();

        $order = $user->orders()->create(['total' => Cart::total(), 'status' => 'pending ...']);

        $cartItems = Cart::content();

        foreach ($cartItems as $cartItem)
        {
            $order->orderFields()->attach($cartItem->name, ['qty' => $cartItem->qty, 'tax' => Cart::tax(), 'total' => $cartItem->qty * $cartItem->price]);
        }
    }
}
