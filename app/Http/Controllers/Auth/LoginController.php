<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function showLogin() {
        return $this->loginService->show();
    }

    public function handleLogin(Request $request) {
        return $this->loginService->handleLogin($request);
    }

    public function logout() {
        return $this->loginService->logout();
    }
}
