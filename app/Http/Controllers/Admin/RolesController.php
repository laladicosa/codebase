<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index(){
    	$roles = Role::all()->toArray();
    	return view('backend.roles', compact('roles'));
    }
}
