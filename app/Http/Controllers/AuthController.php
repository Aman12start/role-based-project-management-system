<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            $request -> session()->regenerate();

            return Auth::user()->role === 'admin'?redirect('/admin/dashboard')->with('success','Welcome Admin'):redirect('/user/dashboard')->with('success','Welcome User');
        }

        return back()->with('error', 'Credential Not Matched');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','Logged out Successfully');
    }
}
