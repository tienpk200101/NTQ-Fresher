<?php

namespace App\Http\Middleware;

use App\Constants\UserConst;
use Closure;
use Illuminate\Http\Request;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->guard('web')->check()) {
//            if(auth()->user()->role == UserConst::ADMIN) {
                return redirect(route('admin.product.show'));
//            } elseif(auth()->user()->role == UserConst::CLIENT) {
//                return redirect(route('home'));
//            }
        }

        return redirect(route('admin.login.show'));
    }
}
