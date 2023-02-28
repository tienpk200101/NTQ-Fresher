<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    protected $userRepo;

	public function __construct(User $user) {

	}

    public function show() {
        return view();
    }
}