<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        if (Auth::user()->isActor())
            return redirect('/');

        $users = User::all();

        return response()->json($users);
    }

    public function changeRole(Request $request)
    {
        if (Auth::user()->isActor())
            return redirect('/admin');

        if ($request->value==="admin") {
            # code...
            DB::table('users')
            ->where('id', $request->id)
            ->update(['admin' => 1, 'actor' => null]);
        }
        if ($request->value==="editor") {
            # code...
            DB::table('users')
            ->where('id', $request->id)
            ->update(['admin' => null, 'actor' => 1]);
        }
        if($request->value==="user") {
            # code...
            DB::table('users')
            ->where('id', $request->id)
            ->update(['admin' => null, 'actor' => null]);
        }
        $users= User::all();

        return response()->json($users);
    }


}
