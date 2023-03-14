<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function __construct()
    {

    }

    public function show() {
        return view('clients.auth.register');
    }

    public function handleRegister(Request $request) {
        $request->validate([
            'email' => 'required|email|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'confirm-password' => 'required|same:password'
        ]);

        $email = $request->get('email');
        $user_name = $request->get('username');
        $password = $request->get('password');
        $user = Customer::create([
            'username' => $user_name,
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
