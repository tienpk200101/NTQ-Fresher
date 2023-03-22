<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordService
{
    public function __construct()
    {

    }

    public function showForgotPassword() {
        return view('client.auth.forgot-pass');
    }

    public function handleForgotPassword($request) {
        $request->validate([
            'email' => 'required|email|max:255|exists:users'
        ]);

        $token = Str::uuid();

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');;
    }

    public function showResetPassword($token) {
        return view('client.auth.reset-password', ['token' => $token]);
    }

    public function handleResetPassword($request) {
        $request->validate([
            'password' => 'required|string|min:8',
            'password-confirm' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['token' => $request->token])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        User::where('email', $updatePassword->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['token'=> $request->token])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
