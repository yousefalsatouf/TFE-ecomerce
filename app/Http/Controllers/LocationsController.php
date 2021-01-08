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
    public function addLocation()
    {
        
    }
    public function removeLocation(Request $request)
    {
        DB::table('locations')->where('id', $request->id)->delete();
        $locations = DB::table('locations')->get();
        
       return response()->json($locations);

    }
}
