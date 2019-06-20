<?php

namespace App\Http\Controllers\Client;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function show_main_page(){
    	$locations = Location::all()->toArray();
        return view('frontend.main', compact('locations'));
    }
}
