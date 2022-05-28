<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControler extends Controller
{
    public function index()
    {
        return view('login.index',
        [
            'tittle' => "Login",

        ]);
    }

    public function auth(Request $request)
    {
       $credentials = $request->validate([
            'tittle' => "Login",

            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            if(auth()->user()->role == 'admin')
            {
                return redirect()->intended('dashboard');
            }

            if(auth()->user()->role == 'ewarung')
            {
                return redirect()->intended('dashboard');
            }

            if(auth()->user()->role == 'pb')
            {
                return redirect()->intended('dashboard-pb');
            }

        }

        return back()->with('login_error', "Failed Login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
