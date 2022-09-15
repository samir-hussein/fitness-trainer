<?php

namespace App\Http\Controllers\Mails;

use App\Mail\ForgotPassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function request_reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter|exists:users,email'
        ]);

        $expire = strtotime(date('Y-m-d H:i:s', strtotime("+20 minutes")));

        $token = Hash::make("$request->email|$expire");

        $details = [
            'token' => $token,
            'email' => $request->email,
            'expire' => $expire
        ];

        try {
            Mail::to($request->email)->send(new ForgotPassword($details));
        } catch (Exception $e) {
            return back()->withError('Something went wrong, please try again later.');
        }

        return back()->withSuccess('We have e-mailed your password reset link!');
    }
}
