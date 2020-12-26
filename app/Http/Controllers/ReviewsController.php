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

    public function submitReply(Request $request)
    {
        $reviewID = (int)$request->reviewID;
        $userID = (int)$request->userID;
        $comment = $request->comment;
        $name = $request->name;

        if (Auth::check()) {
            DB::table('comments')->insert([
                'name' => Auth::user()->name,
                'image' => Auth::user()->image,
                'reply' => $comment,
                'review_id' =>$reviewID,
                'user_id' => Auth::user()->id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
            ]);
        }else {
            DB::table('comments')->insert([
                'name' => $name,
                'reply' => $comment,
                'review_id' =>$reviewID,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' =>date("Y-m-d H:i:s")
            ]);
        }

        $replies = DB::table('comments')
        ->leftJoin('users', 'users.id', '=', 'comments.user_id')
        ->select('comments.*', 'users.image')
        ->where('review_id', '=', $reviewID)
        ->get();
        
        return response()->json($replies);
    }

    public function fetchComments(Request $request)
    {
        $id = (int)$request->id;

        $comments = DB::table('comments')
        ->leftJoin('users', 'users.id', '=', 'comments.user_id')
        ->select('comments.*', 'users.image')
        ->where('review_id', '=', $id)
        ->get();
        
        return response()->json($comments);
    }
}
