<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ValidasiController extends Controller
{
    public function formRegister() {

        return view('register');
    }

    public function Register(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'phone_number' => 'required|min:11',
            'username' => 'required|unique:tenants|min:6|max:255',
            'password' => 'required|min:8',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = Str::random(16);

        if($request->password == $request->confirm_password){
            Tenant::create($validatedData);
            $request->session()->flash('registration-success','Registration successfull! Please login');
            return redirect('/login');
        }
        return back()->with('password-confirm-error','The password and confirmation password do not match. Please try again.');
    }

    public function formLogin() {
        return view('login.tenant');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('tenant')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');   
        } 

        return back()->with('loginError','Login Gagal!');
    }

    public function formLoginOwner() {
        return view('login.owner');
    }

    public function authenticateOwner(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('owner')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError','Login failed!');
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutOwner(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/ownerrr-login');
    }
}