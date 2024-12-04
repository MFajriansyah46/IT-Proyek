<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

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
            return redirect('/login');
        }
        return back()->with('password-confirm-error','The password and confirmation password do not match. Please try again.');
    }

    public function login() {
        return view('login.tenant');
    }

    public function loginOwner() {
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
                return redirect()->intended('/dashboard')->cookie('token', $token, 180, '/', null, true, true);
            }

        } else if($request->guard == 'tenant') {

            Auth::shouldUse('tenant');
            if($token = JWTAuth::attempt($credentials)){
                return redirect('/')->cookie('token', $token, 1440, '/', null, true, true);
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

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // dd($googleUser->getEmail());
    
            // Cari Tenant berdasarkan email
            $tenant = Tenant::where('email', $googleUser->getEmail())->first();
    
            if ($tenant) {
                // Jika Tenant ditemukan, update token Google
                $tenant->update([
                    'google_id' => $googleUser->getId(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken ?? $tenant->google_refresh_token,
                ]);
    
                // Auth::guard('tenant')->login($tenant);
            } else {
                // Jika Tenant tidak ditemukan, buat akun baru
                $tenant = Tenant::create([
                    'name' => $googleUser->getName(),
                    'username' => 'google_' . $googleUser->getId(), // username unik berbasis Google ID
                    'email' => $googleUser->getEmail(),
                    'phone_number' => '6280000000', // Default jika tidak ada informasi dari Google
                    'password' => bcrypt('12345678'), // Password default
                    'google_id' => $googleUser->getId(),
                    'google_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken ?? null,
                ]);
                
                
            }       
             
            auth()->guard('tenant')->login($tenant);
    
            return view('home'); // Arahkan ke dashboard setelah login
    }

    public function googleLogout(Request $request)
    {
        // Hapus token dari database jika ingin menghapus permanen
        Tenant::firstWhere('id', $request->id)->update([
            'google_token' => null,
            'google_refresh_token' => null,
        ]);

        // Revoke token Google jika disimpan
        $token = $request->google_token;

        if ($token) {
            Http::post('https://accounts.google.com/o/oauth2/revoke', [
                'token' => $token,
            ]);
        }


        // Logout dari aplikasi Laravel
        Auth::logout();

        // Redirect ke halaman login dengan pesan
        return redirect('/')->with('success', 'Berhasil logout dari Google!');
    }

}