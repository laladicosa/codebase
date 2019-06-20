<?php

namespace App\Http\Controllers\Client\Properties;

use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Features;
use App\Sale;
use App\Location;
use App\District;

class HousesController extends Controller
{
    public function index(){
    	$total_house = $this->findTotalHouse();
        $location = Location::all();
        if(isset($location)){
            $locations = $location->toArray();
            return view('frontend.properties.house', compact('total_house', 'locations'));
        }
    	return view('frontend.properties.house', compact('total_house'));
    }

    public function location_change(Request $request){
        $districts = District::where('location_id', $request->location_id)->get();
        if(isset($districts)){
            $district_array = $districts->toArray();
            return $district_array;
        }
    }

    public function store(Request $request){
    	$house = new House;
    	$house->title = $request->title;
    	$house->description = $request->description;
    	$house->address = $request->address;
    	$house->status = $request->status;
    	$house->width = $request->width;
    	$house->length = $request->length;
    	$house->price = $request->price;
    	$house->slug = str_slug($request->title);
    	if($request->hasFile('image')){
    		$image = $request->image;
    		$filename = time().'.'.$image->getClientOriginalName();
    		$image->move('uploads/properties/images_storage', $filename);
    		$house->image = 'uploads/properties/images_storage/'.$filename;
    	}
    	if($request->hasFile('image_two')){
    		$image_two = $request->image_two;
    		$filename_two = time().'.'.$image_two->getClientOriginalName();
    		$image_two->move('uploads/properties/images_storage', $filename_two);
    		$house->image_two = 'uploads/properties/images_storage/'.$filename_two;
    	}
    	if($request->hasFile('image_three')){
    		$image_three = $request->image_three;
    		$filename_three = time().'.'.$image_three->getClientOriginalName();
    		$image_three->move('uploads/properties/images_storage', $filename_three);
    		$house->image_three = 'uploads/properties/images_storage/'.$filename_three;
    	}
    	$house->user_id = Auth::user()->id;
        $house->location_id = $request->location_id;
        $house->district_id = $request->district_id;
    	$house->save();

    	return redirect()->route('danh-sach-nha.list')->with('success', 'Uploaded a property successfully !');
    }


    public function list(){
    	$houses = House::where('user_id', Auth::user()->id)->get();
    	if(isset($houses)){
            $house_array = $houses->toArray();
        }
        $features = Features::all();
        if(isset($features)){
            $feature_array = $features->toArray();
        }
        foreach ($house_array as $key => $house) {
            foreach ($feature_array as $key => $feature) {
                if($feature['house_id'] == $house['id']){
                    $house[] = $feature;
                    $hf[] = $house;
                    $hid_storer[] = $house['id'];
                }
            }
        }
        if(isset($hf)){
            foreach ($hf as $key => $f_d) {
                $district = District::where('id', $f_d['district_id'])->first()->toArray();
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
                if($hf[$i]['location_id'] == $arr[$i]['id']){
                    $hf[$i][] = $arr[$i];
                }
            }
        }
        if(isset($hid_storer)){
            $sizeOfHouseArray = sizeof($house_array);
            $hnf = $house_array;
            $hs = [array_reverse($hf), array_reverse($hnf), $sizeOfHouseArray];
        }else{
            $hs = [$house_array];
        }
        return view('frontend.properties.lists', compact('hs'));
    }

    public function info($id, $slug){
    	$house = House::findOrFail($id);
    	$house_arr = $house->toArray();
        $locations = Location::all()->toArray();
        foreach ($locations as $key => $location) {
            if($house_arr['location_id'] == $location['id']){
                $district = District::where('location_id', $location['id'])->first();
                $location[] = $district->toArray();
                $house_arr[] = $location;
            }
        }
    	$total_house = $this->findTotalHouse();
    	return view('frontend.properties.house', compact('house_arr', 'total_house'));
    }

    function findTotalHouse(){
    	$houses = House::where('user_id', Auth::user()->id)->get();
    	$total_house = sizeof($houses);
    	return $total_house;
    }

    public function update(Request $request, $id, $slug){
    	$house = House::findOrFail($id);
    	$house->title = $request->title;
    	$house->description = $request->description;
    	$house->address = $request->address;
    	$house->status = $request->status;
    	$house->width = $request->width;
    	$house->length = $request->length;
    	$house->price = $request->price;
    	$house->slug = str_slug($request->title);
    	if($request->hasFile('image')){
    		$image = $request->image;
    		$filename = time().'.'.$image->getClientOriginalName();
    		$image->move('uploads/properties/images_storage', $filename);
    		$house->image = 'uploads/properties/images_storage/'.$filename;
    	}
    	if($request->hasFile('image_two')){
    		$image_two = $request->image_two;
    		$filename_two = time().'.'.$image_two->getClientOriginalName();
    		$image_two->move('uploads/properties/images_storage', $filename_two);
    		$house->image_two = 'uploads/properties/images_storage/'.$filename_two;
    	}
    	if($request->hasFile('image_three')){
    		$image_three = $request->image_three;
    		$filename_three = time().'.'.$image_three->getClientOriginalName();
    		$image_three->move('uploads/properties/images_storage', $filename_three);
    		$house->image_three = 'uploads/properties/images_storage/'.$filename_three;
    	}
    	$house->user_id = Auth::user()->id;
        $house->location_id = $request->location_id;
        $house->district_id = $request->district_id;
    	$house->save();

    	return redirect()->route('danh-sach-nha.list')->with('success', 'Updated a property successfully !');
    }
}
