<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function login(Request $request)
    {
        // validate inputs
        $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        $credentials = $request->only(['email', 'password']);

        $remember = ($request->has('remember-me')) ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard.home');
        }

        return back()->withError('Invalid Credentials.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function reset_password(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required',
            'expire' => 'required',
            'password' => [
                'confirmed',
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ], [
            'regex' => 'password must contain at least one uppercase letter, one lowercase letter, one digit and one special character.'
        ]);

        $token = "$request->email|$request->expire";

        if (!Hash::check($token, $request->token)) {
            return back()->withError('Corrupted Token.');
        }

        if (strtotime(date('Y-m-d H:i:s')) > $request->expire) {
            return back()->withError('Token Expired.');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')->withSuccess('Password has changed successfully. Login now!');
    }
}
