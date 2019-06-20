<?php

namespace App\Http\Controllers\Client\Nosignin;
use App\User;
use App\Features;
use App\House;
use App\District;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingsController extends Controller
{
    public function index(){
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
    	if(isset($f)){
    		foreach ($f as $key => $f_d) {
    			$district = District::where('id', $f_d['district_id'])->select('name', 'location_id')->first()->toArray();
    			$locations = Location::all()->toArray();
    			foreach ($locations as $key => $location) {
    				if($location['id'] == $district['location_id']){
    					$location[] = $district;
    					$arr[] = $location;
    				} 
    			}
    		}
    	}
    	if(isset($arr)){
    		for ($i=0; $i < sizeof($arr); $i++) { 
    			if($f[$i]['location_id'] == $arr[$i]['id']){
    				$f[$i][] = $arr[$i];
    			}
    		}
    	}

    	if(isset($f)){
    		$houses_arrays = array_reverse($f);
    	}else{
    		$houses_arrays = null;
    	}
    	return view('frontend.nosignin.houselist', compact('houses_arrays'));
    }

    public function details($id, $slug){
    	$house = House::findOrFail($id)->toArray();
    	$feature = Features::where('house_id', $house['id'])->first()->toArray();
    	$location = Location::where('id', $house['location_id'])->first()->toArray();
    	$district = District::where('id', $house['district_id'])->first()->toArray();
    	$user = User::where('id', $house['user_id'])->select('name', 'phone', 'email', 'image')->first()->toArray();

    	return view('frontend.nosignin.details', compact('house', 'feature', 'location', 'district', 'user'));
    }
}
