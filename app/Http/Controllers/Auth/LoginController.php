<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request)
    {
        if ($request->user()->role_id == 4) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            
            if($request->user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('home.guest');
            }
        }
        if ($request->user()->role_id == 3) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            
            if($request->user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('home.guest');
            }
        }
        if ($request->user()->role_id == 2) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            
            if($request->user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('service.dashboard');
            }
        }
        if ($request->user()->role_id == 1) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            
            if($request->user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('admin.dashboard');
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
        // $this->middleware('auth')->except('logout');
    }
}
