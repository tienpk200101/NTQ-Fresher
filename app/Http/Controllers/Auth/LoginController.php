<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
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
        return view('client.auth.login');
    }

    public function handleLogin(AuthRequest $request) {
        return $this->loginService->handleLogin($request);
    }

    public function logout(Request $request) {
        return $this->loginService->logout($request);
    }
}
