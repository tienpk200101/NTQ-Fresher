<?php

namespace Database\Seeders;

use App\Constants\UserConst;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = UserConst::DEMO_ACCOUNT;
        $user['password'] = Hash::make($user['password']);
        User::insert($user);
    }
}
