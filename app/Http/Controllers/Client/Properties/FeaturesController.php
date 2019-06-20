<?php

namespace App\Http\Controllers\Client\Properties;

use App\Features;
use App\House;
use App\Sale;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    public function feature($id){
    	$house = House::findOrFail($id);
    	$house_arr = $house->toArray();
    	$feature = Features::where('house_id', $house_arr['id'])->first();
    	if(isset($feature)){
    		return redirect()->back()->with('warning', 'This property already had features, please only edit them!');
    	}
    	$total_house = $this->findTotalHouse();
    	return view('frontend.properties.features', compact('house_arr', 'total_house'));
    }

    function findTotalHouse(){
    	$houses = House::where('user_id', Auth::user()->id)->get();
    	$total_house = sizeof($houses);
    	return $total_house;
    }

    public function store(Request $request){
    	$feature = new Features;
    	$feature->bedroom = $request->bedroom;
    	$feature->bathroom = $request->bathroom;
    	$feature->living_room = $request->living_room;
    	$feature->kitchen = $request->kitchen;
    	$feature->patio = $request->patio;
    	$feature->garage = $request->garage;
    	$feature->garden = $request->garden;
    	$feature->swimming_pool = $request->swimming_pool;
    	$feature->toilet = $request->toilet;
    	$feature->house_id = $request->house_id;
    	$feature->save();

    	return redirect()->route('danh-sach-nha.list')->with('success', 'Added features successfully !');
    }

    public function edit($id){
    	$feature = Features::findOrFail($id);
    	$feature_arr = $feature->toArray();
    	$house = $feature_arr['house_id'];
    	$house_arr = House::where('id', $house)->first()->toArray();
    	$total_house = $this->findTotalHouse();
    	return view('frontend.properties.features', compact('feature_arr', 'house_arr', 'total_house')); 
    }

    public function update(Request $request, $id){
    	$feature = Features::findOrFail($id);
    	$feature->bedroom = $request->bedroom;
    	$feature->bathroom = $request->bathroom;
    	$feature->living_room = $request->living_room;
    	$feature->kitchen = $request->kitchen;
    	$feature->patio = $request->patio;
    	$feature->garage = $request->garage;
    	$feature->garden = $request->garden;
    	$feature->swimming_pool = $request->swimming_pool;
    	$feature->toilet = $request->toilet;
    	$feature->house_id = $request->house_id;
    	$feature->save();

    	return redirect()->route('danh-sach-nha.list')->with('success', 'Updated features successfully !');
    }
}
