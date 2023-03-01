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
        $email = $request->get('email');
        $user_name = $request->get('username');
        $password = $request->get('password');

        $user = User::create([
            'name' => $user_name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        if($user) {
            return redirect(route('product-detail'));
        } else {
            return redirect(route('register'));
        }
    }
}