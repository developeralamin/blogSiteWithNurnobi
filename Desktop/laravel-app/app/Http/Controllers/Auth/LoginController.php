<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Login form
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /**
     * Login here
     */
    public function login(LoginRequest $request)
    {
        $user = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($user) {
            // $user = Auth::user();
            $user = Auth::user();
            if ($user->email_verified_at) {
                return redirect()->route('dashboard');
            }
            return redirect()->route('login')->withErrors(['Your email  is not verified']);
        } else {
            return redirect()->route('login')->withErrors(['Invalid Email and password']);
        }
    }

    /**
     * Login here
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
