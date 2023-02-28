<?php

namespace App\Services;

class LoginService 
{
    public function __construct()
    {
        
    }

    public function show() {
        return view('auth.login');
    }
}