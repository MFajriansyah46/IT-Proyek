<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
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

    public function formLoginOwner() {
        return view('login.owner');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if($request->guard == 'owner') {

            Auth::shouldUse('owner');
            if ($token = JWTAuth::attempt($credentials)) {
                return redirect()->intended('/dashboard')->cookie('token', $token, 60, '/', null, true, true)->with('success','login berhasil dengan jwt');
            }

        } else if($request->guard == 'tenant') {

            Auth::shouldUse('tenant');
            if($token = JWTAuth::attempt($credentials)){
                return redirect('/')->cookie('token', $token, 60, '/', null, true, true)->with('failed','anyah');
            }
        }

        return back()->with('loginError','Login Failed!');
    }

    public function logout(Request $request) {

        try {
            // Invalidasi token
            $token = $request->header('Authorization');
            JWTAuth::invalidate(JWTAuth::getToken());
    
            return redirect('/');
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to logout, please try again',
                'details' => $e->getMessage()
            ], 500);
        }
    }

}