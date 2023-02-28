<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\ForgotPasswordService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    protected $resetPassService;

    public function __construct(ForgotPasswordService $resetPassService)
    {
        $this->resetPassService = $resetPassService;
    }

    public function showForgotPassword() {
        return $this->resetPassService->show();
    }
}
