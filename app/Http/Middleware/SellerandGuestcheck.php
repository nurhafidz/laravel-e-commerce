<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SellerandGuestcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if ($request->user() != NULL) {
            if ($request->user()->role_id == '3'|| $request->user()->role_id == '4') {
            return $next($request);}
            return new Response(view('unauthorized'));
        }
        else{
            return redirect()->route('login');
            
        }
        
    }
    
}
