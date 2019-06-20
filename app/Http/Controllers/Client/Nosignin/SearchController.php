<?php

namespace App\Http\Controllers\Client\Nosignin;

use App\User;
use App\Features;
use App\House;
use App\District;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request){
    	// Easy remember
    	$array = [$request->location, $request->district];
    	$array1 = [$request->min_price, $request->max_price];
    	$array2 = [$request->bedroom, $request->bathroom]; 
    	$array3 = [$request->property_type];
    	$array4 = [$request->keyword];
    	$array5 = [$request->property_id];
    	$array6 = [$request->width, $request->length];
    
		foreach ($array as $key => $arr) {
			//Location & District
			$searchedByLocationAndDistrict[] = $this->searchThroughTablesForLocations($arr[$key]);
		}

		//KeyWord
		// $houses = House::search($array4[0])->get(); => Elastic Search Methods => 15 days free 
		$houses = House::where('title', 'LIKE', '%'.$array4[0].'%')->get();
		$searchedHousesByKeyword[] = $this->searchByKeyword($houses->toArray());

		$master = [$searchedByLocationAndDistrict, $searchedHousesByKeyword];
		
    }

    function searchByKeyword($houses){
    	foreach ($houses as $key => $house) {
    		$user = User::where('id', $house['user_id'])->pluck('name')->first();
    		$house[] = $user;
    		$feature = Features::where('house_id', $house['id'])->first()->toArray();
    		$house[] = $feature;
    		$location = Location::where('id', $house['location_id'])->first()->toArray();
    		if(isset($location)){
    			$districts = District::all()->toArray();
    			foreach ($districts as $key => $district) {
    				if($district['location_id'] == $location['id']){
    					$location[] = $district;
    					$house[] = $location;
    				}	
    			}
    		}
    	}

    	if(isset($house)){
    		return $house;
    	}else{
    		return "dont have";
    	}
    }

    function searchThroughTablesForLocations($key){
    	$dbs = ['locations', 'districts'];
    	for ($i=0; $i < sizeof($dbs); $i++) { 
    		$found = DB::table(''.$dbs[$i].'')->where('id', 'LIKE', $key)->first();
    		if(isset($found)){
    			$decode = json_decode(json_encode($found), true);
    			$found_array[] = $decode;
    		}
    	}
    	if(isset($found_array)){
	    	foreach ($found_array as $key => $fa) {
	    		$houses = House::where('location_id', $fa['id'])
	    						->orWhere('district_id', $fa['id'])
	    						->get();
	    		if(isset($houses)){
	    			$houses_found = $houses->toArray();
	    		}
	    	}

	    	$locations = Location::all()->toArray();
	    	foreach ($locations as $key => $location) {
	    		$district = District::where('location_id', $location['id'])->first();
	    		if(isset($district)){
	    			$location[] = $district->toArray();
		    		foreach ($houses_found as $key => $house) {
		    			$user = User::where('id', $house['user_id'])->pluck('name')->first();
		    			$house[] = $user;
		    			if($house['location_id'] == $location['id']){
		    				$feature = Features::where('house_id', $house['id'])->first()->toArray();
		    				$house[] = $feature;
		    				$house[] = $location;
		    				$housings[] = $house;
		    			}
		    		}
	    		}
	    	}

	    	return $housings;
    	}else{
    		return "dont have";
    	}
    }
}
