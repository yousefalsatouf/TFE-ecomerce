<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    public function like(Request $request)
    {
        $value = $request->value;
        $id = (int)$request->id;
        $prodID = (int)$request->prodId;

        DB::table('reviews')->where('id', '=', $id)->update(['likes' => $value]);

        $reviews = DB::table('reviews')
        ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
        ->select('reviews.*', 'users.image')
        ->where('product_id', '=', $prodID)
        ->get();
        
        return response()->json($reviews);
    }
}
