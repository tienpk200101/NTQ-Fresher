<?php

namespace App\Services;

use Illuminate\Http\Request;

class RegisterService 
{
    public function __construct()
    {
        
    }
    
    public function show() {
        return view('auth.register');
    }

    public function postRegister(Request $request) {
        dd($request->all());
    }
}