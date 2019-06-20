<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
    	$userCollection = User::all();
    	$users = $userCollection->toArray();
    	foreach ($users as $key => $user) {
    		$role = Role::where('id', $user['role_id'])->first()->toArray();
    		$user[] = $role['role_name'];
            $arr[] = $user;
    	}
    	return view('backend.users', compact('arr'));
    }

    public function search(Request $request){
    	$key = $request->user_search;
    	$users = $this->iterativeSearch($key);
        $roles = Role::all()->toArray();
    	return ['users'=>$users, 'roles'=>$roles];
    }

    function iterativeSearch($word){
    	$elements = ['name', 'email', 'provider'];
    	$i = 0;
    	while($i < sizeof($elements)){
    		$found = User::where(''.$elements[$i].'', 'LIKE', '%'.$word.'%')
    					 ->orWhere(''.trim($elements[$i]).'', trim($word))->get();
    		$all[] = $found;
    		$i++;
    	}
    	return $all;
    }
}
