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
        return redirect('/users')->with('deleted-user', "User ''$user->name'' had been deleted");
    }

    public function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}