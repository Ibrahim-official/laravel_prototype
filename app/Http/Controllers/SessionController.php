<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        // validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to login the user
        if (! Auth::attempt($attributes)) {       // attempt method returns Boolean
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match'
            ]);
        }     
        // regenerate the session token & redirect
        request()->session()->regenerate();         // `regenerate()` prevents session hijacking by refreshing the session token and invalidating the old one.
        return redirect('/jobs');
        
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
