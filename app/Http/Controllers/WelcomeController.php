<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        return view('/');
    }

    Public function welcome(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('profile')->withSuccess('signd in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    
}
