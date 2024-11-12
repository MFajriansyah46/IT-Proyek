<?php

namespace App\Http\Controllers;

use App\Models\Roommate;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RoommateController extends Controller
{
    // Menampilkan formulir Add Roommate
    public function create()
    {
        return view('roommate.add'); // Pastikan Anda memiliki view untuk formulir ini
    }

    // Menyimpan roommate yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Mencari tenant yang sedang login
        $tenant = auth()->user(); // Pastikan tenant yang sedang login

        // Cek apakah tenant sudah memiliki roommate
        if ($tenant->roommate) {
            return back()->with('error', 'You already have a roommate.');
        }

        // Membuat instance baru Roommate
        $roommate = new Roommate();
        $roommate->tenant_id = $tenant->id; // Menghubungkan dengan tenant
        $roommate->name = $request->name;
        $roommate->phone_number = $request->phone_number;

        // Jika ada gambar profil, simpan gambar ke folder 'profile_photos'
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $roommate->image = $path;
        }

        // Simpan roommate ke database
        $roommate->save();

        // Mengarahkan kembali ke halaman tenant dengan pesan sukses
        return redirect()->route('myroom')->with('success', 'Roommate added successfully.');
    }
}
