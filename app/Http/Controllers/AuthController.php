<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);
        $cred = ['email' => $input['email'], 'password' => $input['password']];
        if (Auth::attempt($cred)) {
            return redirect()->route('rmd.index');
        } else {
            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
