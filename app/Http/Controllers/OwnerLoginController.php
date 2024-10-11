<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerLoginController extends Controller
{
    public function read() {
        return view('login.owner');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('owner')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');   
        }

        return back()->with('loginError','Login Gagal!');
    }
}