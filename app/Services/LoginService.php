<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginService
{
    public function __construct()
    {

    }

    public function show() {
        return view('auth.login');
    }

    public function handleLogin(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)) {
            if (Gate::allows('isAdmin')) {
                return redirect()->intended('/admin/manage-product');
            } elseif (Gate::allows('isClient')) {
                return redirect()->intended('/');
            }
        }

        return redirect(route('login'));
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }
}
