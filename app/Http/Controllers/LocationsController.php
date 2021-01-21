<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationsController extends Controller
{
    //
    public function index ()
    {
        $locations = DB::table('locations')->get();
        //dd($locations);
       return response()->json($locations);
    }
    public function addLocation(Request $request)
    {
        DB::table('locations')->insert([
            'title' => $request->title,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'lng' => $request->lng,
            'lat' => $request->lat,
            'hours' => $request->hours,
            'description' => $request->des,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' =>date("Y-m-d H:i:s")
        ]);

        $locations = DB::table('locations')->get();
        
       return response()->json($locations);
    }
    public function removeLocation(Request $request)
    {
        DB::table('locations')->where('id', $request->id)->delete();
        $locations = DB::table('locations')->get();
        
       return response()->json($locations);

    }
}
