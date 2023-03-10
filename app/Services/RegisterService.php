<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function __construct()
    {

    }

    public function show() {
        return view('auth.register');
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'name' => 'required|max:255|unique:users',
            'password' => 'required|max:255'
        ]);

        $email = $request->get('email');
        $user_name = $request->get('name');
        $password = $request->get('password');

        $user = User::create([
            'name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if($user) {
            auth()->login($user);
            return redirect(route('home'));
        } else {
            return redirect(route('register'));
        }
    }
}
