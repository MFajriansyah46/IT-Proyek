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

    protected $t;

    public function __construct(Tenant $tenant)
    {
        $this->t = $tenant;
    }

    public function read(){

        return view('user.users',['users' => $this->t->all()]);
    }

    public function edit($remember_token){
        
        return view('user.editUser',['users' => $this->t->firstWhere('remember_token', $remember_token)]);
    }
    
    public function update(Request $request)
    {
        $tenant = $this->t->firstWhere('remember_token',$request->remember_token);

        if($tenant->username == $request->username){
            $validated = $request->validate([
                'name' => 'required|max:255',
                'phone_number' => 'required|min:11',
                'image' => 'image|nullable'
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'username' => 'required|max:255|unique:tenants,username',
                'phone_number' => 'required|min:11',
                'image' => 'image|nullable'
            ]);
        }

        if($request->password){
            if($request->password == $request->confirm_password){
                $validated['password'] = $request->password;
            } else{
                return back()->with('password-confirm-error','The password and confirmation password do not match.');
            }
        }

        if($request->image) {
            $validated['image'] = $request->file('image')->store('profile-images');
        }

        if($tenant->update($validated)){
            return redirect('/users')->with('success', 'The user profile has been successfully updated.');
        } else {
            return redirect('/users')->with('failed', 'The user profile update was fail.');
        }
    }
    
    public function delete(Request $request){

        $tenant = $this->t->firstWhere('remember_token', $request->remember_token);

        if($tenant->delete()){
            return redirect('/users')->with('success', "User ''$tenant->username'' had been deleted");
        } else {
            return redirect('/users')->with('failed', "Failed to delete the user.");
        }

    }
}