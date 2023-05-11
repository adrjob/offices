<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Str;

class SessionsController extends Controller
{

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();

        if (Auth::user()->isAdmin()) {
            return redirect()->route('office.dubai');
            // return redirect(RouteServiceProvider::HOMEDUBAI);
        }
        
        if (Auth::user()->isTurkey()) {
            return redirect()->route('office.turkey');
            // return redirect(RouteServiceProvider::HOMETURKEY);
        }

        if (Auth::user()->isDubai()) {
            return redirect()->route('office.dubai');
            // return redirect(RouteServiceProvider::HOMEDUBAI);
        }

        if (Auth::user()->isVanuatu()) {
            return redirect()->route('office.vanuatu');
            // return redirect(RouteServiceProvider::HOMEVANUATU);
        }                          

    }

    public function show(){

        if(env('IS_DEMO')){

            return back()->with('demo', 'This is a demo version. You can not change the password.');
        }
        else{
        request()->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            request()->only('email')
        );
    
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
    }

    public function update(){
        
        request()->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]); 
          
        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => ($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );
    
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }


    public function destroy()
    {
        auth()->logout();

        return redirect('/sign-in');
    }

}
