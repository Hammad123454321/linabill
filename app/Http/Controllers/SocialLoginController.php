<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function googleProvider() 
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallbackHandel() 
    {
        $user = Socialite::driver('google')->user();
        $data = User::where('email', $user->email)->first();
        if(is_null($data)){

            $users['name'] = $user->nickname;
            $users['email'] = $user->email;
            $data = User::create($users);
        }
        Auth::login($data);
        return redirect('home');


    }


    public function facebookProvider() 
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallbackHandel() 
    {
        $user = Socialite::driver('facebook')->user();
        $data = User::where('email', $user->email)->first();
        if(is_null($data)){

            $users['name'] = $user->nickname;
            $users['email'] = $user->email;
            $data = User::create($users);
        }
        Auth::login($data);
        return redirect('home');


    }


    public function save_news_letter(Request $request) 
    {
        $newsletter = new NewsLetter();
        $newsletter->email = $request->input('email');

        $newsletter->save();

        return back()->with('success', 'You have subscribed our newsletter successfully!');
    }




}
