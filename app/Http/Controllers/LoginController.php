<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
            return redirect()->route('dashboard.index');  //redirect ke halaman dashboard
            // return "Dashboard";
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password')))
        {
            // return('Login Success');
            return redirect()->route('dashboard.index'); //redirect ke halaman dashboard
        }
        return redirect('/')->with('error', 'Username atau Password anda salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}