<?php

namespace App\Http\Controllers\user;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        if (User::where('email', $user->getEmail())->exists()) {
            $existUserData =User::where('email', $user->getEmail())->first();
            Auth::guard()->login($existUserData);
            return redirect('/login');
        } else {
            $userData = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('12341234'),
                'role' => 2,
                'created_at' => Carbon::now(),
            ]);
            Auth::guard()->login($userData);
            return redirect('/login');
            # code...
        }
        
    

        
    }
}
