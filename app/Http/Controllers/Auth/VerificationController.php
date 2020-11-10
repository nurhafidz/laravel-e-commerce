<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DETAIL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    // protected function authenticated(Request $request)
    // {
    //     if ($request->user()->roles_id == 4) { // do your magic here
    //         $credentials = $request->only($this->username(), 'password');
            
    //         if($request->user()->alamat_lengkap == null){
    //             return redirect()->route('detail.user');
    //         }    
    //         else{
    //             return redirect()->route('home.guest');
    //         }
    //     }
    //     if ($request->user()->roles_id == 2 && $request->user()->status_id == 1) { // do your magic here
    //         $credentials = $request->only($this->username(), 'password');
    //         $credentials['status_id'] = 1;
    //         return redirect()->route('writter.home');
    //     }
    //     if ($request->user()->status_id == 2) {
    //         return redirect()->route('writter.home');
    //     }
    //     if ($request->user()->status_id == 3) {
    //         if($request->user()->alamat_lengkap == null){
    //             return redirect()->route('detail.user');
    //         }
    //         else{
    //             return redirect()->route('home.guest');
    //         }
    //     }
    // }
}
