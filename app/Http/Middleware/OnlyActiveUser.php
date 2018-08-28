<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Closure;

class OnlyActiveUser
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
        if( Auth::check() && Auth::user()->active ){
            return $next($request);
        }
        $email = Auth::user()->email;
        Auth::logout();
        Log::error('Email: '.$email.' đăng nhập thất bại, tài khoản chưa được kích hoạt');
        return redirect()->route('login')->with('status_error', 'Đăng nhập thất bại, tài khoản chưa được kích hoạt!');
    }
}
