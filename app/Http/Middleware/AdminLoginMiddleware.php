<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->status == 1){
                if($user->permission == 1){
                    return $next($request);
                }
                else{
                    return redirect()->route('loginUser');
                }
            }
            else{
                return redirect()->route('loginUser');
            }
        }
        else{
            return redirect()->route('loginUser');
        }
    }
}
