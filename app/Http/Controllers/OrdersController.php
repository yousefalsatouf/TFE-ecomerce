<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orderStatus = DB::table('orders')
            ->join('orders_product', 'orders.id', '=', 'orders_product.orders_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->get();
        return response()->json($orderStatus);
    }

    public function changeOrderStatus(Request $request)
    {
        //dd($request->value);
        $id = $request->id;
        $value = $request->value;

        DB::table('orders')->where('id', $id)->update(['status' => $value]);

        return response()->json(['success'=>'Status is updated !']);

    }
}
