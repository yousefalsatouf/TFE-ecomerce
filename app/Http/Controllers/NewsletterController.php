<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('front/newsletter');
    }

    public function store(Request $request)
    {
        //dd($request);
        if ( ! Newsletter::isSubscribed($request->email) )
        {
            Newsletter::subscribePending($request->email);
            DB::table('users')->where('id', Auth::id())->update(['subscribed_newsletter' => true]);
            return redirect('/create-newsletter')->with('success', 'Thanks For Subscribe');
        }
        return redirect('/create-newsletter')->with('failure', 'Sorry! You have already subscribed ');

    }
}
