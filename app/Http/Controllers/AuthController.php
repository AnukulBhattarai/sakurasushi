<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function loginPage()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view("admin.pages.login");
    }

    public function login(Request $request)
    {



        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request['email'];
        $password = $request['password'];


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors('The credentials does not match!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back()->withSuccess('Successfully logged out!');
    }
}
