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
            return redirect('/user');

        $users = User::all();

        return response()->json($users);
    }

    public function findUser($id)
    {
        if (Auth::user()->isActor())
            return redirect('/user');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function editUser(Request $request, $id)
    {
        if (Auth::user()->isActor())
            return redirect('/user');

        $role = $request->role;
        //dd($role);

        if ($role == 'admin')
            //dd($role);
            DB::table('users')->where('id', $id)->update(['admin' => 1, 'actor' => null]);
        elseif ($role == 'actor')
            //dd($role);
            DB::table('users')->where('id', $id)->update(['admin' => null, 'actor' => 1]);
        else
            //dd($role);
            DB::table('users')->where('id', $id)->update(['admin' => null, 'actor' => null]);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        if (Auth::user()->isActor())
            return redirect('/user');

        User::findOrFail($id)->delete();

        return redirect()->back();
    }
}
