<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginService
{
    public function handleLogin($request) {
        $credentials = $request->only('username', 'password');
        if(Auth::guard('customer')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect(route('login'))->with('error', 'Login fail!');
    }

    public function logout($request) {
        if(Auth::guard('customer')->check()) {
            Auth::guard('customer')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect(route('home'));
    }
}
