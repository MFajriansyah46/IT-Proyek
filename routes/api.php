<?php

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::group([ 'middleware' => 'api', 'prefix' => 'auth'], function($router) {
    
    Route::post('login', function(Request $request){
                // Validasi input
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Ambil guard dari request (default 'tenant' jika tidak ada)
        $guard = $request->guard ?? 'tenant';
    
        // Validasi guard
        if (!in_array($guard, ['tenant', 'owner'])) {
            return response()->json(['error' => 'Guard tidak valid!'], 400);
        }
    
        // Set guard yang sesuai
        Auth::shouldUse($guard);
    
        // Coba autentikasi dan generate token menggunakan JWTAuth
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Login failed!'], 401);
        }

        // Return hanya token
        return response()->json([
            'token' => $token
        ], 200);
    });

    Route::get('me', function(Request $request){
        return response()->json(auth('owner')->user());
    });
    
    
});