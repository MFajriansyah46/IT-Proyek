<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sail\Console\AddCommand;

class TenantController extends Controller {
    //
    public function read(){
        $users = Tenant::get();
        return view('user.users',compact('users'));
    }

    public function add() {
        return view('register.User');
    }

    public function submit(Request $request) {
            $user = new Tenant;
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->save();

            return redirect('/users');
    }

    public function edit($id){
        $users = Tenant::find($id);
        return view('user.editUser',compact('users'));
    }
    
    public function update(Request $request, $id){
        $user = Tenant::find($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->update();

        return redirect('/users');
    }
    
    public function delete($id){
        $user = Tenant::find($id);
        $user->delete();
        
        return redirect('/users');
    }

    public function readLogin() {
        return view('login.tenant');
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::guard('tenant')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/buildings');   
        }

        return back()->with('loginError','Login Gagal!');
    }
}