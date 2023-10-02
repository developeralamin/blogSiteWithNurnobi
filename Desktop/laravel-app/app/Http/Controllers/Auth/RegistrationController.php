<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Mail\VerificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    /**
     * Registration form
     */
    public function registerForm()
    {
        return view('auth.registration');
    }
    /**
     * Registration formSubmit
     */
    public function register(RegistrationRequest $request)
    {
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Mail::to($user->email)->send(new VerificationMail($user));

        Session::flash('message', 'Registration successfully done');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }
}
