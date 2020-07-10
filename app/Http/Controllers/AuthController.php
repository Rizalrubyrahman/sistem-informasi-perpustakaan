<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function cekLogin(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }else{
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
