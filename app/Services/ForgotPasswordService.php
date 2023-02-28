<?php

namespace App\Services;

class ForgotPasswordService
{
    public function __construct()
    {
        
    }

    public function show() {
        return view('auth.forgot-pass');
    }
}