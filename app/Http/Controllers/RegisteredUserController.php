<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\confirm;

class RegisteredUserController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store() {
        // dd(request()->all());  To see all inputs from that inputs

        // validate the request
        $attributes = request()->validate([
            'first_name'    => ['required'],
            'last_name'     => ['required'],
            'email'         => ['required', 'email'],
            'password'      => ['required', Password::min(6), 'confirmed'],     // password_confirmation
        ]);

        // create the user
        $user = User::create($attributes);
        
        // log in
        Auth::login($user);

        // redirect
        return redirect('/jobs');
        
    }
}
