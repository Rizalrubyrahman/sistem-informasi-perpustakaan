<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function cekLogin(LoginRequest $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }else{
            session()->flash('error', 'Username/Password yang anda masukan salah');
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
