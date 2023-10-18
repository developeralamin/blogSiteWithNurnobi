<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Notifications\VerifyMailNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
        $token                  = Str::random(20);

        $user                   = new User();
        $user->name             = $request->name;
        $user->email            = $request->email;
        $user->password         = Hash::make($request->password);
        $user->email_verification_token = $token;
        $user->save();

        // Mail::to($user->email)->send(new EmailVerification($user));
        $user->notify(new VerifyMailNotification($user));


        Session::flash('message', 'Registration successfully done');
        Session::flash('alert-class', 'alert-danger');
        return back();
    }

    /**
     * Verified Email account
     * 
     * @return #token
     */
    public function verify($token)
    {
        $userToken =  User::where('email_verification_token', $token)->first();
        if ($userToken) {
            $userToken->email_verification_token = null;
            $userToken->email_verified_at = Carbon::now();

            $userToken->save();

            session()->flash('message', "Your email  is verified");
            return redirect()->route('login');
        }
        return redirect()->route('login')->withErrors(['Sorry !! Your token is not matched.']);
    }
}
