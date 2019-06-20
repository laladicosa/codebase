<?php

namespace App\Http\Controllers\Client;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Signedin;

class AuthController extends Controller
{
    public function __construct(){
        return $this->middleware('signedin');
    }
    public function login(){
        return view('backend.auth.login');
    }

    public function register(){
        return view('backend.auth.register');
    }
}
