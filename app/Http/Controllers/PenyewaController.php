<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyewaController extends Controller
{
    public function index(Request $request) {
        $data ['users'] = User::query()->select(['id','email','email_verified_at']);
    }
}
