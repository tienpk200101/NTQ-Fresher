<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $registerRepo;

    public function __construct(RegisterService $registerRepo)
    {
        $this->registerRepo = $registerRepo;
    }

    public function showRegister() {
        return $this->registerRepo->show();
    }

    public function postRegister(Request $request) {

        return $this->registerRepo->postRegister($request);
    }
}
