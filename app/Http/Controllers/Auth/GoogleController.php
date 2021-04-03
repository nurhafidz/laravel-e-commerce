<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use Carbon\Carbon;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        if (Auth::check()) {
            return redirect('/');
        }
 
        $oauthUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('google_id', $oauthUser->id)->first();
        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect('/');
        } else {
            $newUser = User::create([
                
                'first_name' => $oauthUser->name,
                    'last_name' => $oauthUser->name,
                    'email' => $oauthUser->email,
                    'google_id'=> $oauthUser->id,
                    'password' => encrypt('12345678'),
                    'role_id'=>4,
                    'email_verified_at'=> Carbon::now(),
            ]);
            Auth::login($newUser);
            return redirect('/detailuser');
        }
        
    }
    
}
