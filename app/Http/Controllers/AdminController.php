<?php

namespace App\Http\Controllers;

use App\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function store()
    {
        return view('admin');
    }

    public function inbox()
    {
        $unreadMessages = DB::table('inbox')->whereNull('is_read')->get();
        $countUnreadMessages = DB::table('inbox')->whereNull('is_read')->count();
        $readMessages = DB::table('inbox')->whereNotNull('is_read')->get();
        $countReadMessages = DB::table('inbox')->whereNotNull('is_read')->count();
        //dd($unreadMessages);
        return view('admin/inbox/index', compact('unreadMessages', 'readMessages', 'countReadMessages', 'countUnreadMessages'));
    }

    public function readMessage($id)
    {
        $unreadMessages = DB::table('inbox')->whereNull('is_read')->get();
        $countUnreadMessages = DB::table('inbox')->whereNull('is_read')->count();
        $readMessages = DB::table('inbox')->whereNotNull('is_read')->get();
        $countReadMessages = DB::table('inbox')->whereNotNull('is_read')->count();
        //dd($id);
        Inbox::where('id', $id)->update(array('is_read' => 1));
        $message = DB::table('inbox')->where('id', $id)->get();
        //dd($message);
        return view('admin/inbox/index', compact('message', 'unreadMessages', 'countUnreadMessages', 'readMessages', 'countReadMessages'));
        //return redirect('readMsg')->with($message);
    }

    public function clearAllMessages()
    {
        Inbox::truncate();

        return back()->with('msg', 'All emails have been cleared!');
    }

    public function clearMessage($id)
    {
        Inbox::findOrFail($id)->delete();

        return redirect('admin/inbox/')->with('msg', 'message had been cleared!');
    }
}
