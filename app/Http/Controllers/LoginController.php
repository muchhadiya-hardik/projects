<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $data = User::where('email',$user->email)->first();
        if(is_null($data)){
            $userData['name']=$user->name;
            $userData['email']=$user->email;
            $data=User::create($userData);

        }
        Auth::login($data);
        return redirect('front.dashboard');

    }
    public function handleTwitterCallback()
    {
        $user = Socialite::driver('twitter')->user();
        $data = User::where('email',$user->nickname)->first();
        if(is_null($data)){
            $userData['name']=$user->name;
            $userData['email']=$user->nickname;
            $data=User::create($userData);

        }
        Auth::login($data);
        return redirect('front.dashboard');
    }
    public function handelGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $data = User::where('email',$user->email)->first();
        if(is_null($data)){
            $userData['name']=$user->name;
            $userData['email']=$user->email;
            $data=User::create($userData);

        }
        Auth::login($data);
        return view('front.dashboard');
    }
}
