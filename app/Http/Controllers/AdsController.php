<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    //
    public function index()
    {
        $ads = Ads::all();

        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->title;
        $des = $request->description;
        $link = $request->link;
        $image = $request->image;

        //dd($image);
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image'] = $imageName;
        }

        DB::table('ads')->insert([
            'title' => $title,
            'description' => $des,
            'link' => $link,
            'image' => $imageName
        ]);


        return back()->with('msg','Ad added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ads::findOrFail($id)->delete();

        return back()->with('msg','Ad deleted!');
    }
}
