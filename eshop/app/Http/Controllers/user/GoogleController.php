<?php

namespace App\Http\Controllers\user;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

        if (User::where('email', $user->getEmail())->exists()) {
            $existUserData =User::where('email', $user->getEmail())->first();
            Auth::guard()->login($existUserData);
            return redirect('/login');
        } else {
            $userData = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('12312345'),
                'role' => 2,
                'created_at' => Carbon::now(),
            ]);
            Auth::guard()->login($userData);
            return redirect('/login');
            # code...
        }
        
    

        
    }
}
