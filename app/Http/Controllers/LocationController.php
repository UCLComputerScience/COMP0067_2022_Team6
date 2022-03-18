<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LocationController extends Controller{

    $orders = DB::select('id', 'lon', 'lat');

    return view('members', [
        'orders' => $orders
    ]); 

}