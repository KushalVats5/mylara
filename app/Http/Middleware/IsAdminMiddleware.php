<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use User;
class IsAdminMiddleware
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
            if(Auth::check() && Auth::user()->user_type === 'admin'){
                return $next($request);
            }else{
                return redirect('auth/login');
            }
        }else{
            return redirect('auth/login');
        }
    }
}