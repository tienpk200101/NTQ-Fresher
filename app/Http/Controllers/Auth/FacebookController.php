<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = Customer::where('provider_id', $user->id)->first();

            if($findUser) {
                auth()->guard('customer')->login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = Customer::updateOrCreate([
                    'email' => $user->email,
                    'full_name' => $user->name,
                    'provider_id' => $user->id,
                    'provider_name' => 'facebook',
                    'avatar' => $user->avatar,
                    'password' => Hash::make('12345678')
                ]);

                auth()->guard('customer')->login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
