<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ForgotPasswordService;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    protected $forgotPasswordService;

    public function __construct(ForgotPasswordService $forgotPasswordService)
    {
        $this->forgotPasswordService = $forgotPasswordService;
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function showForgotPassword() {
        return $this->forgotPasswordService->showForgotPassword();
    }

    /**
     * @param Request $request
     */
    public function handleForgotPassword(Request $request) {
        return $this->forgotPasswordService->handleForgotPassword($request);
    }
}
