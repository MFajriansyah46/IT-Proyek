<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sail\Console\AddCommand;

class TenantController extends Controller {
    //
    public function read(){
        $users = Tenant::get();

        return view('user.users',compact('users'));
    }

    public function edit($remember_token){
        $users = Tenant::where('remember_token', $remember_token)->first();
        return view('user.editUser',compact('users'));
    }
    
    public function update(Request $request){

        $user = Tenant::where('remember_token', $request->remember_token)->first();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);

        if($request->image){
            $user->image = $request->file('image')->store('profile-images');
        }
        
        $user->update();
        return redirect('/users');
    }
    
    public function delete(Request $request){
        $user = Tenant::where('remember_token', $request->remember_token)->first();
        $user->delete();
        return redirect('/users');
    }

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
        return back()->with('password-confirm-error','password and confirm password is not same!');
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

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}