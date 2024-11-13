<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('layouts.login'); // Adjust this path if needed
    }

    // Process login form submission
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('admindash');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ]);
    }
}