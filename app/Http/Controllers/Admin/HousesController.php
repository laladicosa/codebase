<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\House;
use App\Features;
use App\Location;
use App\District;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HousesController extends Controller
{
    public function all_houses(){

    	$user = User::all()->toArray();
    	foreach ($user as $key => $u) {
    		$house = House::where('user_id', $u['id'])->get()->toArray();
    		$hauses[] = $house;
    		for ($i=0; $i < sizeof($hauses); $i++) { 
    			foreach ($hauses[$i] as $key => $hu) {
    				if($hu['user_id'] == $u['id']){
    					$hu[] = $u;
    					$arr_all[] = $hu;
    				}
    			}
    		}
    		foreach ($house as $key => $h) {
    			$feature = Features::where('house_id', $h['id'])->first();
    			if(isset($feature)){
    				$feature_to_array = $feature->toArray();
    				foreach ($user as $key => $us) {
    					if($h['user_id'] == $us['id']){
    						$h[] = $us;
    					}
    				}
    				$h[] = $feature_to_array;
    				$f[] = $h;
    				
    			} 
    		}
    	}
    	foreach ($f as $key => $f_d) {
    		$district = District::where('id', $f_d['district_id'])->first()->toArray();
    		$locations = Location::all()->toArray();
    		foreach ($locations as $key => $location) {
    			if($location['id'] == $district['location_id']){
    				$location[] = $district;
    				$arr[] = $location;
    			} 
    		}
    	}
    	for ($i=0; $i < sizeof($arr); $i++) { 
    		if($f[$i]['location_id'] == $arr[$i]['id']){
    			$f[$i][] = $arr[$i];
    		}
    	}

    	$house_matches_feature[] = array_reverse($f);
    	$master_arrays = ['all'=>array_reverse($arr_all), 'has-features'=>$house_matches_feature[0]];
    	return view('backend.houses', compact('master_arrays'));
    }

    public function trash($id){
    	$house = House::find($id);
    	$house->delete();
    	return redirect()->back()->with('message', 'Trashed a house successfully!');
    }

    public function all_trashed(){
    	$house = House::onlyTrashed()->get();
    	$houses = $house->toArray();
    	foreach ($houses as $key => $h) {
    		$owners = User::where('id', $h['user_id'])->first();
    		$owner = $owners->toArray();
    	}
    	return view('backend.trashed', compact('houses', 'owner'));
    }

    public function restore_house($id){
    	House::withTrashed()->find($id)->restore();
    	return redirect()->route('all_houses')->with('success', 'Restored a house successfully!');
    }
}
