<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use User;

class IsSubscriberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if(Auth::check()){
            if(Auth::check() && Auth::user()->user_type == 'subscriber'){
                return $next($request);
            }else{
                return redirect('auth/admin');
            }
        }else{
            return redirect('auth/login');
        }
    }
}
