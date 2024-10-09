<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sail\Console\AddCommand;

class UserController extends Controller {
    //
    public function read(){
        $users = User::get();
        return view('user.users',compact('users'));
    }

    public function add() {
        return view('user.addUser');
    }

    public function submit(Request $request) {
            $user = new User;
            $user->name = $request->name;
            $user->phone_number = $request->phone_number;
            $user->username = $request->username;
            $user->password = $request->password;
            $user->save();

            return redirect('/users');
    }

    public function edit($id){
        $users = User::find($id);
        return view('user.editUser',compact('users'));
    }
    
    function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->update();

        return redirect('/users');
    }
    
    function delete($id){
        $user = User::find($id);
        $user->delete();
        
        return redirect('/users');
    }
}