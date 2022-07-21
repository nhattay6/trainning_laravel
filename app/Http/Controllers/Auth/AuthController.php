<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Socialite;
// use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function __construct()
    {

    }


    
    public function socialSignup($provider)
    {
        // Socialite will pick response data automatic 
        $user = Socialite::driver($provider)->stateless()->user();

        return response()->json($user);
    }

    public function social($provider) {
        $auth = Socialite::driver($provider)->stateless()->user();
        $email = $auth->getEmail();
        $user = User::where('email', $email);
        // ....
        if($user) {
            // update
        } else {
            //create use
        }
        // If $user existed => conduct to update
        // Else create a new account.
    }  


    // public function social($provider) {
    //     try {
    //         $access_token = Socialite::driver($provider)->stateless()->getAccessTokenResponse(request()->code);
    //         Session::put('access_token', $access_token['access_token']);
    //     } catch(RequestException $e) {
    //         if (Session::has('access_token')) {
    //             $auth = Socialite::driver($provider)->userFromToken(Session::get('access_token'));		
    //             $user = User::where('email', $auth->getEmail());
    //             // ....
    //             // If $user existed => conduct to update
    //             // Else create a new account.
    //         }
    //     }
    // }
}
