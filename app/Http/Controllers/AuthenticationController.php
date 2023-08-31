<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function showLoginForm()
    {
        return view('session.login-session');
    }

    public function login(LoginRequest $request)
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($attributes)) {
            session()->regenerate();

            return redirect('dashboard')->with(['success'=>'You are logged in.']);
        }

        return back()->withErrors(['email'=>'Email or password invalid.']);
    }

    public function register()
    {

    }
}
