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
    protected function authenticated(Request $request)
    {
        if ($request->user()->roles_id == 4) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            
            if($request->user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('home.guest');
            }
        }
        if ($request->user()->roles_id == 2 && $request->user()->status_id == 1) { // do your magic here
            $credentials = $request->only($this->username(), 'password');
            $credentials['status_id'] = 1;
            return redirect()->route('writter.home');
        }
        if ($request->user()->status_id == 2) {
            return redirect()->route('writter.home');
        }
        if ($request->user()->status_id == 3) {
            return redirect()->route('writter.home');
        }
    }
}
