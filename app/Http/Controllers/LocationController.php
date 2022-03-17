<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use DB;

class LocationController extends Controller
{
    public function gmaps()
    {
    	$location = DB::table('location')->get();
    	return view('gmaps',compact('location'));
    }


}