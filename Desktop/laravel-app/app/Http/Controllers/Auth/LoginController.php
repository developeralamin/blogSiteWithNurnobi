<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Login form
     */
    public function loginForm()
    {
        return view('auth.login');
    }
}
