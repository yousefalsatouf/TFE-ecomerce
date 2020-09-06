<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $locations = DB::table('locations')->get();
        //dd($locations);
        return view('front.contact', compact('locations'));
    }

    public function submitForm(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $sub = $request->sub;
        $msg = $request->message;

        DB::table('inbox')->insert([
            'name' => $name,
            'email' => $email,
            'sub' => $sub,
            'message' => $msg,
        ]);

        return back()->with('msg', 'Email sent successfully, we will contact you as soon as we can.');
    }
}
