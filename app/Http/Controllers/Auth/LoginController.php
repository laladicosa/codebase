<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Session;
use DateTime;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();

        // return $user->name;

        $userExists = User::where('email', $user->email)->first();
        if($userExists){
            $email = $userExists->email;
            $password = $userExists->plaintext;
            return view('backend.auth.login', compact('email', 'password'));
        }else{
            $the_pass = "facebook-".str_random(40);
            $userNew = new User;
            $userNew->name = $user->name;
            $userNew->email = $user->email;
            $userNew->password = Hash::make($the_pass);
            $userNew->email_verified_at = new DateTime();
            $userNew->provider = "facebook";
            $userNew->provider_id = $user->getId();
            $userNew->plaintext = $the_pass;
            $userNew->role_id = 2;
            $userNew->image = $user->getAvatar();
            $userNew->save();
            return redirect()->route('signin')->with('success','Registered with facebook successfully! Please click ');
            // return "done";

        }
    }




    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();

        // return $user->name;

        $userExists = User::where('email', $user->email)->first();
        if($userExists){
            $email = $userExists->email;
            $password = $userExists->plaintext;
            return view('backend.auth.login', compact('email', 'password'));
        }else{
            $the_pass = "google-".str_random(40);
            $userNew = new User;
            $userNew->name = $user->name;
            $userNew->email = $user->email;
            $userNew->password = Hash::make($the_pass);
            $userNew->email_verified_at = new DateTime();
            $userNew->provider = "google";
            $userNew->provider_id = $user->getId();
            $userNew->plaintext = $the_pass;
            $userNew->save();
            $userNew->role_id = 2;
            $userNew->image = $user->getAvatar();
            return redirect()->route('signin')->with('success','Registered with google successfully! Please click ');
            // return "done";

        }
    }
}
