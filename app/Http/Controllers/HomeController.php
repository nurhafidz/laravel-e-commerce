<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id == 4) { // do your magic here
            
            if(Auth::user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('home.guest');
            }
        }
        if (Auth::user()->role_id == 3) { // do your magic here
            
            if(Auth::user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('home.guest');
            }
        }
        if (Auth::user()->role_id == 2) { // do your magic here
            
            if(Auth::user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('service.dashboard');
            }
        }
        if (Auth::user()->role_id == 1) { // do your magic here
            
            if(Auth::user()->alamat_lengkap == null){
                return redirect()->route('detail.user');
            }
            else{
                return redirect()->route('admin.dashboard');
            }
        }
    }
}
