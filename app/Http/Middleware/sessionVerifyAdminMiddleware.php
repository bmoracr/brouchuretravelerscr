<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class sessionVerifyAdminMiddleware
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
        if(Auth::check() &&  Auth::user()->status == 1){

            if(Auth::user()->role == 'admin' || Auth::user()->role == 'transfers'  || Auth::user()->role == 'operations'){
                    
                return $next($request);
                
            }else{

                return redirect('/');
            }

            
        }else{
            return redirect('/login');

        }
    }
}
