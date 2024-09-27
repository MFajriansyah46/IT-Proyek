<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    //
    public function index(Request $request){
        $data ['users'] = User::query()->select(['id','name','email','email_verified_at']);

        return view('users', $data);
    }
}